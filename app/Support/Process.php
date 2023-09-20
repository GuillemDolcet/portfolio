<?php

namespace App\Support;

use Closure;
use RuntimeException;

class Process
{
    /**
     * Process ids array.
     *
     * @var array
     */
    protected array $pids = [];

    /**
     * Forks a new process to execute the supplied closure.
     *
     * @param Closure $closure
     * @param mixed $args
     * @return void
     */
    public function fork(Closure $closure, ...$args): void
    {
        $pid = pcntl_fork();

        switch ($pid) {
            case -1:
                throw new RuntimeException('Could not fork!');
            break;

            case 0:
                $closure(...$args);
                exit(0);

            default:
                $this->pids[] = $pid;
                break;
        }
    }

    /**
     * Executes the command in a new child process. Output from the command
     * will be redirected through proper channels STDIN/STDOUT/STDERR.
     *
     * @param string $command
     * @return  void
     */
    public function exec(string $command): void
    {
        $this->fork(fn () => passthru($command));
    }

    /**
     * Join operation. Waits for the children to finish.
     *
     * @return void
     */
    public function join(): void
    {
        while (count($this->pids) > 0) {
            foreach ($this->pids as $key => $pid) {
                $result = pcntl_waitpid($pid, $status, WNOHANG);

                if ($result == -1 || $result > 0) {
                    unset($this->pids[$key]);
                }
            }

            usleep(1000);
        }
    }
}
