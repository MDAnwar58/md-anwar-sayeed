
<div class="col-md-9 mb-5">
    <div class="row" id="education-list">
        <div class="col-md-6">
            <h3 class="pb-2">Education</h3>
        </div>
    </div>
</div>
<script>
    getEducations();
    async function getEducations()
    {
        const URL = "/educationData"
        try {
        // show loader hide content
        document.getElementById("loading-div").classList.remove("d-none");
        document.getElementById("content-div").classList.add("d-none");

            const response = await axios.get(URL);

        // hide loader shwo content
        document.getElementById("loading-div").classList.add("d-none");
        document.getElementById("content-div").classList.remove("d-none");

            response.data.forEach((education) => {
                document.getElementById("education-list").innerHTML+=(`
        <div class="col-md-12 main_col mb-4">
            <div class="card card-body">
                <div class="row text-md-start text-center">
                    <div class="col-lg-4 col-md-5 px-4 py-2 education_left_col">
                        <div class="education_card">
                            <h5 class="text-secondary">2015 - 2017</h5>
                            <span class="h6">Barnett Collage</span><br />
                            <p class="text-muted fair">Fairfield, NY</p>
                            <span class="text-muted field">Master's <br> Web Development</span>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 d-flex align-items-center">
                        <p class="px-md-0 px-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo iste,
                            ad
                            repellat et non doloremque, impedit quas quae ut beatae expedita,
                            fuga
                            sequi totam. Officiis consequuntur nostrum omnis totam distinctio
                            assumenda porro necessitatibus voluptatum dolorum optio aliquam.
                        </p>
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
