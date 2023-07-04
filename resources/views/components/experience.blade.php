<div class="col-md-9">
    <div class="row"id="experience-list">
        <div class="col-sm-6 text-sm-start text-center">
            <h3 class="text-primary">Experience</h3>
        </div>
        <div class="col-sm-6 text-sm-end text-center mb-4">
            <button type="button" class="btn btn-primary">
                <i class="fa fa-download me-1" aria-hidden="true"></i>
                Download Resume
            </button>
        </div>

    </div>
</div>

<script>
    getExperiences();
    async function getExperiences()
    {
        const URL = "/experiencesData"
        try {
        // show loader hide content
        document.getElementById("loading-div").classList.remove("d-none");
        document.getElementById("content-div").classList.add("d-none");

            const response = await axios.get(URL);

        // hide loader shwo content
        document.getElementById("loading-div").classList.add("d-none");
        document.getElementById("content-div").classList.remove("d-none");

            response.data.forEach((experience) => {
                document.getElementById("experience-list").innerHTML+=(`<div class="col-md-12 main_col mb-4">
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-5 px-4 py-2 experience_left_col">
                        <div class="experience_card">
                            <h5 class="text-primary">${experience.duration}</h5>
                            <h6>${experience.title}</h6>
                            <span class="text-muted">${experience.designation}</span>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 d-flex align-items-center text-md-start text-center">
                        <p class="px-md-0 px-4">${experience.details}</p>
                    </div>
                </div>
            </div>
        </div>`)
            });
        } catch (error) {
            alert(error);
        }
    }
</script>
