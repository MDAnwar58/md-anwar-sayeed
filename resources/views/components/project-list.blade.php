<div class="project_bg pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="pt-4 p-3 text-center">Projects</h2>
            </div>
        </div>
        <div class="row justify-content-md-center" id="project-list">



        </div>
    </div>
</div>

<script>
    getProjectList();
async function getProjectList()
{
    let URL = "/projectsData";
    try {

        // show loader hide content
        document.getElementById("loading-div").classList.remove("d-none");
        document.getElementById("content-div").classList.add("d-none");

        let response = await axios.get(URL);

        // hide loader shwo content
        document.getElementById("loading-div").classList.add("d-none");
        document.getElementById("content-div").classList.remove("d-none");

        response.data.forEach((item) => {
            document.getElementById("project-list").innerHTML+=(`<div class="col-xl-8 col-lg-10 col-12">
                <div class="card mb-3 projects_card">
                    <div class="row g-0">
                        <div class="col-sm-7 order-sm-first order-last  d-flex align-items-center">
                            <div class="card-body px-5">
                                <h4 class="card-title">${item.title}</h4>
                                <p class="card-text text-muted">${item.details}</p>
                                <a class="text-decoration-none fs-6 fw-bolder" target="_blank" href="${item.previewLink}">View Project</a>
                            </div>
                        </div>
                        <div class="col-sm-5 order-sm-last order-first img_col">
                            <img src="${item.thumbnailLink}" id="img" class="img-fluid rounded-end"
                                alt="...">
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

@section('script')
<script>
    var img = document.getElementById("img");

    function myFunction(x) {
        if (x.matches) { // If media query matches
            img.classList.remove("rounded-end");
            img.classList.add("rounded-top");
        } else {
            img.classList.add("rounded-end");
            img.classList.remove("rounded-top");
        }
    }

    var x = window.matchMedia("(max-width: 576px)")
    myFunction(x) // Call listener function at run time
    x.addListener(myFunction) // Attach listener function on state changes
</script>
@endsection
