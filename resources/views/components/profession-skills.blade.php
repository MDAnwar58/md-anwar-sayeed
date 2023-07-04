<div class="row mb-4" id="skill-list">
    <div class="col-12 pb-4">
        <!-- <i class="fa fa-gg" aria-hidden="true"></i> -->
        <span class="skill_icon me-3">
            <i class="fa fa-ravelry" aria-hidden="true"></i>
        </span>
        <span class="h4">Professional Skills</span>
    </div>
</div>

<script>
    getSkills();
    async function getSkills()
    {
        const URL = "/skillsData"
        try {
        // show loader hide content
        document.getElementById("loading-div").classList.remove("d-none");
        document.getElementById("content-div").classList.add("d-none");

            const response = await axios.get(URL);

        // hide loader shwo content
        document.getElementById("loading-div").classList.add("d-none");
        document.getElementById("content-div").classList.remove("d-none");

            response.data.forEach((skill) => {
                document.getElementById("skill-list").innerHTML+=(`<div class="col-lg-4 col-md-6 mb-2">
                <div class="card card-body professon_cards">
                    <span>${skill.name}</span>
                </div>
            </div>`)
            });
        } catch (error) {
            alert(error);
        }
    }
</script>
