$(document).ready(function(){
  $(document).on("click", ".public-profile-page", function(){
    var profileInner = document.getElementById("public-profile-name");
    var profileName = profileInner.innerHTML;
    console.log(profileName);
  });
});
