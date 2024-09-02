$(document).ready(function () {
    $(document).on('click', '.input-group .eye-icon', function () {
        const inputId = $(this).attr('for');
        if ($(this).find('.fa-eye-slash').length) {
            $(this).html(`<i class="fa-regular fa-eye"></i>`);
            $(`#${inputId}`).attr('type', 'text');
        } else {
            $(this).html(`<i class="fa-regular fa-eye-slash"></i>`);
            $(`#${inputId}`).attr('type', 'password');
        }
    });

    typeof NiceSelect !== 'undefined' &&
        NiceSelect.bind &&
        $.each($('select'), function (index, selector) {
            const id = $(selector).attr('id');
            const searchable = $(selector).attr('searchable');
            const options = {
                searchable: searchable == 'true' || false,
                placeholder: 'select',
                searchtext: 'Search',
                selectedtext: 'geselecteerd',
            };

            NiceSelect.bind(document.getElementById(id), options);
        });

    $(document).on('click', '.faq-section .btn-collapse', function () {
        $(this).closest('.card').find('.card-body').slideToggle();
    });

    //     const showLoginPage = () => {
    //         document.title = 'Krust-Investments | Login';
    //         $('#login-signup-tab-area').show();
    //         $('#login-card').show();
    //         $('#forgotPass-tab-area').hide();
    //         $('#signup-card').hide();
    //         $('#forgotPass-tab-area').hide();
    //         $('#forgotPass-card').hide();
    //     };
    //     const showSignUpPage = () => {
    //         document.title = 'Krust-Investments | Signup';
    //         $('#login-signup-tab-area').show();
    //         $('#login-card').hide();
    //         $('#forgotPass-tab-area').hide();
    //         $('#signup-card').show();
    //         $('#forgotPass-tab-area').hide();
    //         $('#forgotPass-card').hide();
    //     };
    //     const showForgotPassPage = () => {
    //         document.title = 'Krust-Investments | Forgot Password';
    //         $('#login-signup-tab-area').hide();
    //         $('#login-card').hide();
    //         $('#forgotPass-tab-area').hide();
    //         $('#signup-card').hide();
    //         $('#forgotPass-tab-area').show();
    //         $('#forgotPass-card').show();
    //     };
    //     $(document).on(
    //         'click',
    //         '.login-section .btn-tab.btn-login-card',
    //         function () {
    //             $('#login-signup-tab-area .btn-login-card').addClass('active');
    //             $('#login-signup-tab-area .btn-signup-card').removeClass('active');
    //             showLoginPage();
    //         },
    //     );
    //     $(document).on(
    //         'click',
    //         '.login-section .btn-tab.btn-signup-card',
    //         function () {
    //             $('#login-signup-tab-area .btn-login-card').removeClass('active');
    //             $('#login-signup-tab-area .btn-signup-card').addClass('active');
    //             showSignUpPage();
    //         },
    //     );
    //     $(document).on(
    //         'click',
    //         '.login-section .btn-tab.btn-forgotPass-card',
    //         function () {
    //             showForgotPassPage();
    //         },
    //     );
    //     $(document).on('click', '.btn-login', function () {
    //         localStorage.setItem('loginPageShowCard', 'login');
    //         showLoginPage();
    //     });
    //     $(document).on('click', '.btn-signup', function () {
    //         localStorage.setItem('loginPageShowCard', 'signup');
    //         showSignUpPage();
    //     });
    //     $(document).on('click', '.btn-forgotPassword', function () {
    //         localStorage.setItem('loginPageShowCard', 'forgotPassword');
    //         showForgotPassPage();
    //     });
});
