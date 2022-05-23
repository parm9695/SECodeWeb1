
$( document ).ready(function(){
    $('#formRegister').validate({
        rules:{
            name: 'required',
            email: {
                required: true,
                email: true
            },
            phone:{
                required: true,
                number: true,
                maxlength: 20
            },
            username:{
                required: true,
                minlength: 4
            },
            password:{
                required: true,
                minlength: 4
            },
            confirm_password:{
                required: true,
                minlength: 4,
                equalTo: '#password'
            },
        },
        messages:{
            name:'Please enter your Full name.',
            email: {
                required: 'Please enter your Email.',
                email: 'Please enter a valid Email.'
            },
            phone:{
                required: 'Please enter a valid Phone number.',
                number: 'Please enter numbers only.',
                maxlength:'Please do not enter more than 20 numbers.'
            },
            username:{
                required: 'Please enter a valid Username.',
                minlength: 'Please fill in at least 4 characters.'
            },
            password:{
                required: 'Please enter a valid Password.',
                minlength: 'Please fill in at least 4 characters.'
            },
            confirm_password:{
                required: 'Please enter a valid Password.',
                minlength: 'Please fill in at least 4 characters.',
                equalTo: 'Please enter the same password information.' 
            }
        },
        errorElement: 'div',
        errorPlacement: function ( error,element ){
            error.addClass('invalid-feedback')
            error.insertAfter( element )
        },
        highlight: function( element, errorClass, validClass ){
            $( element ).addClass( 'is-invalid' ).removeClass( 'is-valid' ) 
        },
        unhighlight: function( element, errorClass, validClass ){
            $( element ).addClass( 'is-valid' ).removeClass( 'is-invalid' ) 
        }
    });
})
$( document ).ready(function(){
    $('#formUpdate1').validate({
        rules:{
            username:{
                required: true,
                minlength: 4
                },
            name: 'required',
            email: {
                required: true,
                email: true
                },
            phone:{
                required: true,
                number: true,
                maxlength: 20
                }

            
            },
            messages:{
                username:{
                    required: 'Please enter a valid Username.',
                    minlength: 'Please fill in at least 4 characters.'
                },
                name:'Please enter your Full name.',
                email: {
                    required: 'Please enter your Email.',
                    email: 'Please enter a valid Email.'
                },
                phone:{
                    required: 'Please enter a valid Phone number.',
                    number: 'Please enter numbers only.',
                    maxlength:'Please do not enter more than 20 numbers.'
                }
            },
        errorElement: 'div',
        errorPlacement: function ( error,element ){
            error.addClass('invalid-feedback')
            error.insertAfter( element )
        },
        highlight: function( element, errorClass, validClass ){
            $( element ).addClass( 'is-invalid' ).removeClass( 'is-valid' ) 
        },
        unhighlight: function( element, errorClass, validClass ){
            $( element ).addClass( 'is-valid' ).removeClass( 'is-invalid' ) 
        }
    });
    
})
function recaptchaCallback(){
    $('#submit').removeAttr('disabled');
}
$('.custom-file-input').on('change',function(){
    var fileName =  $(this).val().split('\\').pop()
    $(this).siblings('.custom-file-label').html(fileName)
    if(this.files[0]){
        var reader = new FileReader()
        $('.figure').addClass('d-block')
        reader.onload = function(e){
            $('#imgUpload').attr('src',e.target.result).width(240)
        }
        reader.readAsDataURL(this.files[0])
    }
})

$( document ).ready(function(){
    $('#formPassword').validate({
        rules:{
            oldpassword:{
                required: true,
                minlength: 4
                },
            password:{
                required: true,
                minlength: 4
                },
            repassword:{
                required: true,
                minlength: 4,
                equalTo: '#password'
                }
            
            },
            messages:{
                oldpassword:{
                    required: 'Please enter your old password.',
                    minlength: 'Please fill in at least 4 characters.'
                    },
                password:{
                    required: 'Please enter your New password.',
                    minlength: 'Please fill in at least 4 characters.'
                    },
                repassword:{
                    required: 'Please enter your Confirm password.',
                    minlength: 'Please fill in at least 4 characters.',
                    equalTo: '#password'
                    }
            },
        errorElement: 'div',
        errorPlacement: function ( error,element ){
            error.addClass('invalid-feedback')
            error.insertAfter( element )
        },
        highlight: function( element, errorClass, validClass ){
            $( element ).addClass( 'is-invalid' ).removeClass( 'is-valid' ) 
        },
        unhighlight: function( element, errorClass, validClass ){
            $( element ).addClass( 'is-valid' ).removeClass( 'is-invalid' ) 
        }
    });
    
    
}) 
$( document ).ready(function(){
    $('#formProof').validate({
        rules:{
            imgproof: required,
            bank:required,
            time:required,
            amount:required          
            },
            messages:{
                imgproof: 'Please fill out the correct information.',
                bank:'Please fill out the correct information.',
                time:'Please fill out the correct information.',
                amount:'Please fill out the correct information.'
            },
        errorElement: 'div',
        errorPlacement: function ( error,element ){
            error.addClass('invalid-feedback')
            error.insertAfter( element )
        },
        highlight: function( element, errorClass, validClass ){
            $( element ).addClass( 'is-invalid' ).removeClass( 'is-valid' ) 
        },
        unhighlight: function( element, errorClass, validClass ){
            $( element ).addClass( 'is-valid' ).removeClass( 'is-invalid' ) 
        }
    });
    
    
}) 
var swiper = new Swiper(".brandCar", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    pagination: {
      el: ".swiper-pagination",
    },
    mousewheel: true,
    keyboard: true,
    loop: true,
    autoplay: {
    delay: 9500,
    disableOnInteraction: false
    }
  });

  document.querySelector('.home').onmousemove = (e) =>{

document.querySelectorAll('.home-parallax').forEach(elm =>{

let speed = elm.getAttribute('data-speed');

let x = (window.innerWidth - e.pageX * speed) / 90;
let y = (window.innerHeight - e.pageY * speed) / 90;

elm.style.transform = `translateX(${y}px) translateY(${x}px)`;

});

};


document.querySelector('.home').onmouseleave = (e) =>{

document.querySelectorAll('.home-parallax').forEach(elm =>{

elm.style.transform = `translateX(0px) translateY(0px)`;

});

};

var swiper = new Swiper(".myinfo", {
    scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
    },
});



