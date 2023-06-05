"use strict";    
function toHome() {
    window.location.href = "https://85153.stu.sd-lab.nl/e-toets_v0.3/home.php";
}

function toBewerk() {
    window.location.href = "https://85153.stu.sd-lab.nl/e-toets_v0.3/bewerkToets.php";
}

function alert(data){
    const container = document.querySelector(".navbarAlert");

    container.innerHTML = `
        <div class="alert alert-warning alert-dismissible fade show w-100" role="alert">
            ${data}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    $('.alert').delay(2000).fadeOut('slow');

}

function alert2(data){
    const container = document.querySelector(".navbarAlertReg");

    container.innerHTML = `
        <div class="alert alert-warning alert-dismissible fade show w-100" role="alert">
            ${data}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    $('.alert').delay(2000).fadeOut('slow');

}

$(document).on('submit', '#log_in_form', function(){
    let formData = $(this).serialize();
    //console.log(formData);
    $.ajax({
        method: "POST",
        url: "scripts/database/log_in.php",
        data: formData,
        success: function(data){
            if(data == "true"){
                window.location.href = 'home.php';
            }else{
                alert("Uw inlognaam en wachtwoord komen niet overeen. Probeer het nogmaals.");
            }
        },
        error: function(data, error){
            console.log(data);
        }
    });
});

$(document).on('submit', '#nieuwe_toets_form', function(){
    let formData = $(this).serialize();
    //console.log(formData);
    $.ajax({
        method: "POST",
        url: "scripts/database/nieuwe_toets.php",
        data: formData,
        success: function(data){
            if(data == "true"){
                //window.location.href = 'home.php';
                alert("Nieuwe toets is succesvol aangemaakt.");
                setInterval(toHome, 2500);

            }else{
                alert("Bij het aanmaken van een toets is een fout opgetreden. Probeer later nogmaals.");
            }
        },
        error: function(data, error){
            console.log(data);
        }
    });
});

$(document).on('submit', '#delete_toets_form', function(){
    let formData = $(this).serialize();
    //console.log(formData);
    $.ajax({
        method: "POST",
        url: "scripts/database/deleteToets.php",
        data: formData,
        success: function(data){
            if(data == "true"){
                //window.location.href = 'home.php';
                alert("Toets is succesvol verwijdert.");
                setInterval(toHome, 2500);
            }else{
                alert("Bij het verwijderen van een toets is een fout opgetreden. Probeer later nogmaals.");
            }
        },
        error: function(data, error){
            console.log(data);
        }
    });
});

$(document).on('submit', '.update_toets_form', function(){
    let formData = $(this).serialize();
    //console.log(formData);
    $.ajax({
        method: "POST",
        url: "scripts/database/updateToetsData.php",
        data: formData,
        success: function(data){
            if(data == "true"){
                alert("Toetsgegevens zijn succesvol aangepast.");

            }else{
                alert("Bij het aanpasen van toetsgegevens is een fout opgetreden. Probeer later nogmaals.");
            }
        },
        error: function(data, error){
            console.log(data);
        }
    });
});

$(document).on('submit', '#add_question_toets_form', function(){
    let formData = $(this).serialize();
    //console.log(formData);
    $.ajax({
        method: "POST",
        url: "scripts/database/questionAdd.php",
        data: formData,
        success: function(data){
            if(data == "true"){
                alert("Nieuwe vraag is toegevoegd.");
                setInterval(toBewerk, 1500);
            }else{
                alert("Bij het toevoegen van een nieuwe vraag is een fout opgetreden. Probeer later nogmaals.");
            }
        },
        error: function(data, error){
            console.log(data);
        }
    });
});

$(document).on('submit', '.update_question_toets_form', function(){
    let formData = $(this).serialize();
    //console.log(formData);
    $.ajax({
        method: "POST",
        url: "scripts/database/update_question_toets_form.php",
        data: formData,
        success: function(data){
            if(data == "true"){
                alert("Vraag is succesvol bijgewerkt.");
                setInterval(toBewerk, 1500);
            }else{
                alert("Bij het bijwerken van een vraag is een fout opgetreden. Probeer later nogmaals.");
            }
        },
        error: function(data, error){
            console.log(data);
        }
    });
});

$(document).on('submit', '.delete_question_form', function(){
    let formData = $(this).serialize();
    //console.log(formData);
    $.ajax({
        method: "POST",
        url: "scripts/database/deleteQuestionToets.php",
        data: formData,
        success: function(data){
            if(data == "true"){
                //window.location.href = 'home.php';
                alert("Vraag is succesvol verwijdert.");
                setInterval(toBewerk, 2500);
            }else{
                alert("Bij het verwijderen van een vraag is een fout opgetreden. Probeer later nogmaals.");
            }
        },
        error: function(data, error){
            console.log(data);
        }
    });
});

$(document).on('submit', '#toets_login_check', function(){
    let formData = $(this).serialize();
    //console.log(formData);
    $.ajax({
        method: "POST",
        url: "scripts/database/log_in_toets.php",
        data: formData,
        success: function(data){
            if(data == "true"){
                window.location.href = 'toetsMaken.php';
            }else{
                alert("Wachtwoord komt niet overeen. Probeer het nogmaals.");
            }
        },
        error: function(data, error){
            console.log(data);
        }
    });
});

$(document).on('submit', '#inlever_toets', function(){
    let formData = $(this).serialize();
    //console.log(formData);
    $.ajax({
        method: "POST",
        url: "scripts/database/inlever_toets.php",
        data: formData,
        success: function(data){
            if(data == "true"){
                window.location.href = 'home.php';
            }else{
                alert("Er ging iets mis. Toets is niet opgeslagen. Probeer later nogmaals.");
            }
        },
        error: function(data, error){
            console.log(data);
        }
    });
});




$(document).on('submit', '#reg_form', function(){
    let formData = $(this).serialize();
    //console.log(formData);
    $.ajax({
        method: "POST",
        url: "scripts/database/register.php",
        data: formData,
        success: function(data){
            if(data == "true"){
                window.location.href = 'index.php?message=U heeft succesvol nieuwe account aangemaakt!';
            }
            else if(data == "false"){
                alert2("Username is al in gebruik!");
            }else{
                alert2("Er ging iets mis. Probeer het later nogmaals.");
            }
        },
        error: function(data, error){
            console.log(data);
        }
    });
});