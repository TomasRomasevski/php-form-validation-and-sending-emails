function validateForm() {
    let firstName = document.forms["castingForm"]["firstName"].value;
    let lastName = document.forms["castingForm"]["lastName"].value;
    let age = document.forms["castingForm"]["age"].value;
    let phone = document.forms["castingForm"]["phone"].value;
    let email = document.forms["castingForm"]["email"].value;
    let socialMedia = document.forms["castingForm"]["socialMedia"].value;
    let youtubeUrl = document.forms["castingForm"]["youtubeUrl"].value;
    let aboutMe = document.forms["castingForm"]["aboutMe"].value;
    let acceptTerms = document.forms["castingForm"]["acceptTerms"].value;
    if (firstName == "" || lastName == "" || age == "" || age < 16 || phone == "" || phone.length < 9 || phone.length > 16 || email == "" || socialMedia == "" || youtubeUrl == "" || aboutMe == "" || acceptTerms == "") {
      alert("Fill in all input fields");
      return false;
    }
} 
