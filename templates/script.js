jQuery(document).ready(function($){

    $("#login").click(function(e){
        e.preventDefault();
        let fname = $("#name").val();
        let email =  $("#email").val();
        let nameerror = $("#name-error");
        let emailerror = $("#emailerror");
        $("#name").on('input',function(){
            nameerror.text('');
        })
        $("#emailerror").on('input',function(){
            emailerror.text('');
        })
        nameerror.text('');
        emailerror.text('');
        if(fname === ''){
            nameerror.text('Name is required').css('color','red');
        }
        if(email === ''){
            emailerror.text('Email is required').css('color','red');
        }
        if ( nameerror.text() != '' || emailerror.text() != '' ){
            return false;
        }
        let selectedGender = $(".gender1").val();
        let mpassword = $('#current-password').val();
        let country = $("#country").val();
        let formData = {
            'name' : fname,
            'email' : email,
            'password': mpassword,
            'gender' : selectedGender,
            'country' : country,
            'form' : 'login',
        }
        $.ajax({
            url: 'db_request.php',
            type: 'POST',
            contentType: 'application/json',
            data : JSON.stringify(formData),
            success: function(response){
                if(response == 'ok'){
                    window.location.href = "http://localhost/php/project/templates/login.php";
                }else{
                    $("#response").text(response);
                }
            }

        })
    })
    // 
    $("#signin").click(function(e){
        e.preventDefault();

        let email = $("#email").val();
        let mpassword = $("#current-password").val();
        formData = {
            'email' : email,
            'password': mpassword,
            'form' : 'signin'
            };
            $.ajax({
                url: 'db_request.php',
                type: 'POST',
                contentType: 'application/json',
                data : JSON.stringify(formData),
                success: function(response){
                    if(response == 'success'){
                        window.location.href = "http://localhost/php/project/templates/home.php";
                    }else{
                        $("#reponce").text(response);
                    }
                }
        })
    })

    // js for update btn
    $("#update").click(function(e){
        e.preventDefault();
        let fname = $("#name").val();
        let email = $("#email").val();
        let mpassword = $('#current-password').val();
        // let selectedGender = $(".gender1").val();
        let selectedGender = $('input[name="gender"]:checked').val();
        let country = $("#country").val();
        let user_id = $("#user_id").val();
        let formData = {
            'name' : fname,
            'email' : email,
            'password': mpassword,
            'gender' : selectedGender,
            'country' : country,
            'user_id' : user_id,
            'form' : 'update',
        }
        $.ajax({
            url: 'db_request.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(formData),
            success: function(response) {
                $('#response').text(response);
            },
            error: function(xhr) {
                $('#response').text('Error: ' + xhr.status);
            }
        })
    });
    

    $("#signup").click(function(e){
        e.preventDefault();
        window.location.href = "http://localhost/php/project/templates/signup.php"
        
    });
        $("#cal").click(function(e){
        e.preventDefault();
        window.location.href = "http://localhost/php/project/calculater/index.html"
    }); 
    $("#add-ser").click(function(e){
        e.preventDefault();
        window.location.href = "http://localhost/php/project/templates/add_services.php"
    });
    $("#show").click(function(e){
        e.preventDefault();
        window.location.href = "http://localhost/php/project/templates/show_services.php"
    });
    $("#add").click(function(e){
        e.preventDefault();
        let title = $("#title").val();
        let ndescription =  $("#descrription").val();
        let user_id = $("#user_id").val();
        let imageUrl = $("#img")[0].files[0];
        let titleerror = $("#title-error");
        let deserror = $("#des-error");
        $("#title").on('input',function(){
            titleerror.text('');
        })
        $("#descrription").on('input',function(){
            deserror.text('');
        })
        titleerror.text('');
        deserror.text('');
        if(title === ''){
            titleerror.text('Title is required').css('color','red');
        }
        if(ndescription === ''){
            deserror.text('Description is required').css('color','red');
        }
        if ( titleerror.text() != '' || deserror.text() != '' ){
            return false;
        }
        let formData = new FormData();
        formData.append('title', title);
        formData.append('des', ndescription);
        formData.append('user_id', user_id);
        formData.append('image_url', imageUrl);
        formData.append('form', 'add');
        $.ajax({
            url: 'db_request.php',
            type: 'POST',
            data : formData,
            contentType: false, // Do not set any content type header
            processData: false,
            success: function(response){
                if(response == 'ok'){
                    window.location.href = "http://localhost/php/project/templates/show_services.php";
                }else{
                    $("#response").text(response);
                }
            }

        })
    })
    $(".edit").click(function(e){
        e.preventDefault();
        let serviceID = $(this).attr('data-service');
        window.location.href = "http://localhost/php/project/templates/edit_services.php?service="+serviceID;
    });
    $("#update_service").click(function(e){
        e.preventDefault();
        let title = $("#title").val();
        let ndescription =  $("#descrription").val();
        let id = $("#id").val();
        let imageUrl = $("#img")[0].files[0];

        if ( !imageUrl ) {
            imageUrl = 'not-added';
        }

        let titleerror = $("#title-error");
        let deserror = $("#des-error");
        $("#title").on('input',function(){
            titleerror.text('');
        })
        $("#descrription").on('input',function(){
            deserror.text('');
        })
        titleerror.text('');
        deserror.text('');
        if(title === ''){
            titleerror.text('Title is required').css('color','red');
        }
        if(ndescription === ''){
            deserror.text('Description is required').css('color','red');
        }
        if ( titleerror.text() != '' || deserror.text() != '' ){
            return false;
        }
        let formData = new FormData();
        formData.append('title', title);
        formData.append('des', ndescription);
        formData.append('id', id);
        formData.append('image_url', imageUrl);
        formData.append('form', 'edit');
        $.ajax({
            url: 'db_request.php',
            type: 'POST',
            data : formData,
            contentType: false, // Do not set any content type header
            processData: false,
            success: function(response){
                if(JSON.parse(response) == 'success'){
                    window.location.href = "http://localhost/php/project/templates/show_services.php";
                }else{
                    $("#response").text(response);
                }
            }
        });
    });
    $(".del").click(function(e){
        e.preventDefault();
        let id = $(this).attr('data-service');
        let formData = new FormData();
        formData.append('id', id);
        formData.append('form', 'delete');
        $.ajax({
            url: 'db_request.php',
            type: 'POST',
            data : formData,
            contentType: false, // Do not set any content type header
            processData: false,
            success: function(response){
                if(response == 'ok'){
                    window.location.href = "http://localhost/php/project/templates/show_services.php";
                }else{
                    $("#response").text(response);
                }
            }
        })
    })
});
