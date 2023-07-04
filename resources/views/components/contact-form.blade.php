<div class="contact mt-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text_body text-center pt-4">
                            <span>
                                <i class="fa fa-id-card-o" aria-hidden="true"></i>
                            </span>
                            <h2 class="pt-3">Get in touch</h2>
                            <p class="text-muted pb-3">Let's work together!</p>
                        </div>
                        <form action="" id="contactForm">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <input type="text" name="fullName" id="fullName" placeholder="Full Name"
                                            class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" name="email" id="email" placeholder="Email address"
                                            class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" name="phone" id="phone" placeholder="Phone Number"
                                            class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <textarea name="message" id="message" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let contactForm = document.getElementById('contactForm');
    contactForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        let fullName = document.getElementById("fullName").value;
        let email = document.getElementById("email").value;
        let phone = document.getElementById("phone").value;
        let message = document.getElementById("message").value;

        if(fullName.length === 0) {
            console.log("please enter your name")
            return;
        }else if(email.length === 0) {
            console.log("please enter your email")
            return;
        }else if(phone.length === 0) {
            console.log("please enter your phone")
            return;
        }else if(message.length === 0) {
            console.log("please enter your message")
            return;
        }else{
            let formData = {
                fullName: fullName,
                email: email,
                phone: phone,
                message: message,
            }

            let URL = "/contactRequest";
            // show loader hide content
            document.getElementById("loading-div").classList.remove("d-none");
            document.getElementById("content-div").classList.add("d-none");

            let result = await axios.post(URL, formData);

            // hide loader shwo content
            document.getElementById("loading-div").classList.add("d-none");
            document.getElementById("content-div").classList.remove("d-none");

            if(result.status === 200 && result.data === 1)
            {
                alert('Your request has been submit successfully!');
                contactForm.reset();
            }else{
                alert('Something went wrong!');
            }
        }
    });
</script>
