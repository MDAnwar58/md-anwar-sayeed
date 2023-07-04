<div class="about_bg py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>About Me</h2>

                <div id="about-list">

                </div>
                <div class="icon" id="social">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    getAbout();
    async function getAbout()
    {
        const URL = "/aboutData"
        try {
            // show loader hide content
            document.getElementById("loading-div").classList.remove("d-none");
            document.getElementById("content-div").classList.add("d-none");

            const response = await axios.get(URL);
            // hide loader shwo content
            document.getElementById("loading-div").classList.add("d-none");
            document.getElementById("content-div").classList.remove("d-none");

            response.data.forEach((about) => {
                var sentence = about.details;
                var words = sentence.split(" ");
                var selectedWords = "";

                for (var i = 0; i < words.length; i++) {
                    selectedWords += words[i] + " ";
                    if ((i + 1) % 20 === 0) {
                        selectedWords = selectedWords.trim() + "<br>";
                    }
                }
                document.getElementById("about-list").innerHTML+=(`<h6 class="text-muted">${about.title}</h6>
                    <p class="text-secondary pt-2">${selectedWords}</p>`);
            });
        } catch (error) {
            alert(error);
        }
    }
    getSocial();
    async function getSocial()
    {
        const URL = "/socialData"
        try {
            // show loader hide content
            document.getElementById("loading-div").classList.remove("d-none");
            document.getElementById("content-div").classList.add("d-none");

            const response = await axios.get(URL);
            // hide loader shwo content
            document.getElementById("loading-div").classList.add("d-none");
            document.getElementById("content-div").classList.remove("d-none");

            response.data.forEach((social) => {
                document.getElementById("social").innerHTML+=(`<a href="${social.twitterLink}" target="_blank"><i class="fa fa-twitter me-2" aria-hidden="true"></i></a>
                    <a href="${social.linkedinLink}" target="_blank"><i class="fa fa-linkedin-square me-2" aria-hidden="true"></i></a>
                    <a href="${social.githubLink}" target="_blank"><i class="fa fa-github me-2" aria-hidden="true"></i></a>`);
            });
        } catch (error) {
            alert(error);
        }
    }
</script>
