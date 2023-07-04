<div class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-6 hero_col text-md-start text-center">
                <div id="hero-content">

                </div>
                <div class="d-flex justify-content-md-start justify-content-center">
                    <a href="{{ url('/resume') }}" class="btn btn-primary px-5 me-3">Resume</a>
                    <a href="{{ url('/projects') }}" class="btn btn-outline-dark px-5">Projects</a>
                </div>
            </div>
            <div class="col-md-6 img_col d-flex justify-content-center">
                <div class="img_div_box">
                    <div class="img_div_left_1"></div>
                    <div class="img_div">
                        <div class="img_div_left_2"></div>
                        <div id="hero-img">

                        </div>
                        <div class="img_div_right_2"></div>
                    </div>
                    <div class="img_div_right_1"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    getHero();
    async function getHero() {
        const URL = "/heroData";
        try {
            // show loader hide content
            document.getElementById("loading-div").classList.remove("d-none");
            document.getElementById("content-div").classList.add("d-none");

            const response = await axios.get(URL);

            // hide loader shwo content
            document.getElementById("loading-div").classList.add("d-none");
            document.getElementById("content-div").classList.remove("d-none");

            response.data.forEach((hero) => {
                var sentence = hero.title;
                var words = sentence.split(" ");
                var heroTitle = "";

                for (var i = 0; i < words.length; i++) {
                    heroTitle += words[i] + " ";
                    if ((i + 1) % 3 === 0) {
                        heroTitle = heroTitle.trim() + "<br>";
                    }
                }
                document.getElementById("hero-content").innerHTML += (`<span class="design_development_marketing">${hero.keyLine}</span><br>
                <div class="text-muted p mt-2">${hero.short_title}</div>
                <div class="h1 pb-3">${heroTitle}</div>`);

                document.getElementById("hero-img").innerHTML +=
                    (`<img src="upload/images/hero/${hero.img}" alt="">`);
            });
        } catch (error) {
            // alert(error);
            toastr.error('I do not think that word means what you think it means.', 'Inconceivable!')
        }
    }
</script>
