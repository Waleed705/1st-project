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
            url: '1st.php',
            type: 'POST',
            contentType: 'application/json',
            data : JSON.stringify(formData),
            success: function(response){
                if(response == 'ok'){
                    window.location.href = "http://localhost/php/project/1st-signup.php";
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
                url: '1st.php',
                type: 'POST',
                contentType: 'application/json',
                data : JSON.stringify(formData),
                success: function(response){
                    if(response == 'success'){
                        window.location.href = "http://localhost/php/project/1st-home.php";
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
            url: '1st.php',
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
        window.location.href = "http://localhost/php/project/1st-html.php"
        
    });
        $("#cal").click(function(e){
        e.preventDefault();
        window.location.href = "http://localhost/php/project/calculater/index.html"
    });
});
