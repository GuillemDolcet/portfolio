<section id="resume" class="section">
    <div class="container">
        <!-- Heading -->
        <p class=" text-center mb-2 wow fadeInUp"><span class="bg-primary text-dark px-2">Resume</span></p>
        <h2 class="text-10 fw-600 text-center mb-5 wow fadeInUp">A summary of My Resume</h2>
        <!-- Heading end-->

        <div class="row g-5 mt-5">
            <!-- My Education -->
            <div class="col-lg-6 wow fadeInUp">
                <h2 class="text-7 fw-600 mb-4 pb-2">My Education</h2>
                <div class="border-start border-2 border-primary ps-3">
                    @each('home.sections.resume._education', $education, 'educationModel')
                </div>
            </div>
            <!-- My Experience -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                <h2 class="text-7 fw-600 mb-4 pb-2">My Experience</h2>
                <div class="border-start border-2 border-primary ps-3">
                    @each('home.sections.resume._experience', $experiences, 'experience')
                </div>
            </div>
        </div>

        <!-- My Skills -->
        <h2 class="text-7 fw-600 mb-4 pb-2 mt-5 wow fadeInUp">My Skills</h2>
        <div class="row gx-5">
            @foreach($skills->chunk($skills->count() / 2) as $skillsas)
                <div class="col-md-6 wow fadeInUp">
                    @each('home.sections.resume._skill', $skillsas, 'skill')
                </div>
            @endforeach
        </div>
        <p class="text-center mt-5 wow fadeInUp"><a href="#" class="btn btn-outline-dark shadow-none rounded-0">Download CV</a></p>
    </div>
</section>
