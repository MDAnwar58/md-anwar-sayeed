<div class="row" id="language-list">
    <div class="col-12 pb-4">
        <span class="skill_icon me-3">
            <i class="fa fa-code ps-1" aria-hidden="true"></i>
        </span>
        <span class="h4">Languages</span>
    </div>
</div>

<script>
    getLanguages();
    async function getLanguages()
    {
        const URL = "/languageData"
        try {
        // show loader hide content
        document.getElementById("loading-div").classList.remove("d-none");
        document.getElementById("content-div").classList.add("d-none");

            const response = await axios.get(URL);

        // hide loader shwo content
        document.getElementById("loading-div").classList.add("d-none");
        document.getElementById("content-div").classList.remove("d-none");

            response.data.forEach((language) => {
                document.getElementById("language-list").innerHTML+=(`<div class="col-md-4 mb-2 col-sm-6">
                <div class="card card-body professon_cards">
                    <span>${language.name}</span>
                </div>
            </div>`)
            });
        } catch (error) {
            alert(error);
        }
    }
</script>
