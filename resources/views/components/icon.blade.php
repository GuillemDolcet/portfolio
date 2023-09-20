<svg xmlns="http://www.w3.org/2000/svg"
    {{ $attributes->merge(['class' => 'icon']) }}
    width="{{ $width }}"
    height="{{ $height }}"
    viewBox="{{ $viewBox }}"
    stroke-width="{{ $strokeWidth }}"
    stroke="{{ $stroke }}"
    fill="{{ $fill }}"
    stroke-linecap="round"
    stroke-linejoin="round">
@includeIf("components.icons.{$icon}")
 </svg>
