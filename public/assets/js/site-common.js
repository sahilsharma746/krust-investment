// $(document).ready(function () {
//     const layouts = {
//         layout1: {
//             assets: {
//                 CSS: '<link rel="stylesheet" href="./assets/css/old-layout.css">',
//                 js: '<script src="./assets/js/layout.js"></script>',
//             },
//             header: `
// <div class="container">
//     <div class="main-header d-flex flex-wrap justify-content-between align-items-center r-g-10">
//         <a href="./index.html" class="logo-area d-flex align-items-center g-4">
//             <img src="./assets/img/site-logo.png" alt="Site Logo" class="site-logo">
//             <span class="site-name">Krust-Investments</span>
//         </a>
//         <nav class="nav nav-main d-flex flex-wrap g-20">
//             <a class="active" href="./index.html">Home</a>
//             <a href="./home.html">Home 2</a>
//             <a href="">About Us</a>
//             <a href="">Legal Documentation</a>
//         </nav>
//         <div class="header-btns d-flex flex-wrap g-8">
//             <a class="btn btn-login" href="./login.html">log in</a>
//             <a class="btn btn-started" href="./admin.html">Get Started</a>
//         </div>
//     </div>
// </div>
// <div class="header-animation-area">
//     <div class="animation-container">
//         <div class="dashboard-header d-flex justify-content-around r-g-10">
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-up"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-down"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-up"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-down"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-up"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-down"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-up"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-down"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-up"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//         </div>
//     </div>
// </div>
//             `,
//             footer: `
// <div class="container">
//     <div class="main-header d-flex flex-wrap justify-content-between align-items-center r-g-10">
//         <a href="./index.html" class="logo-area d-flex align-items-center g-4">
//             <img src="./assets/img/site-logo.png" alt="Site Logo" class="site-logo">
//             <span class="site-name">Krust-Investments</span>
//         </a>
//         <nav class="nav nav-main d-flex flex-wrap g-20">
//             <a class="active" href="./index.html">Home</a>
//             <a href="./home.html">Home 2</a>
//             <a href="">About Us</a>
//             <a href="">Legal Documentation</a>
//         </nav>
//         <div class="header-btns d-flex flex-wrap g-8">
//             <a class="btn btn-login" href="./login.html">log in</a>
//             <a class="btn btn-started" href="./admin.html">Get Started</a>
//         </div>
//     </div>
// </div>
// <div class="header-animation-area">
//     <div class="animation-container">
//         <div class="dashboard-header d-flex justify-content-around r-g-10">
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-up"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-down"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-up"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-down"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-up"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-down"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-up"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-down"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-up"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//         </div>
//     </div>
// </div>
//             `,
//         },
//         layout2: {
//             assets: {
//                 css: '<link rel="stylesheet" href="./assets/css/site-layout.css">',
//                 js: '',
//             },
//             header: `
// <div class="header-animation-area">
//     <div class="animation-container">
//         <div class="dashboard-header d-flex justify-content-around r-g-10">
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-up"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-down"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-up"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-down"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-up"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-down"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-up"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-down"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//             <div class="price-card d-flex flex-column">
//                 <div class="d-flex justify-content-between align-items-center g-10">
//                     <div class="country-name d-flex align-items-center g-8">
//                         <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
//                         <span>eurusd</span>
//                     </div>
//                     <div class="price">481.3</div>
//                 </div>
//                 <div class="percentage-area d-flex align-items-center g-8">
//                     <i class="fa-solid fa-chevron-up"></i>
//                     <span class="percentage">3.68%</span>
//                 </div>
//             </div>
//         </div>
//     </div>
// </div>
// <div class="main-header">
//     <div class="container d-flex flex-wrap justify-content-between align-items-center g-10">
//         <a href="./index.html" class="logo-area d-flex align-items-center g-4">
//             <img src="./assets/img/site-logo.png" alt="Site Logo" class="site-logo">
//             <span class="site-name">Krust-Investments</span>
//         </a>
//         <div class="header-btns d-flex flex-wrap g-8">
//             <a class="btn btn-login" href="./login.html">Log in</a>
//             <a class="btn btn-started" href="./admin.html">Get Started</a>
//         </div>
//     </div>
// </div>
// <div class="navigation-area">
//     <div class="container d-flex flex-wrap justify-content-between align-items-center g-10">
//         <nav class="nav nav-main">
//             <dl class="d-flex flex-wrap g-20">
//                 <dt><a href="./index.html">Home</a></dt>
                
//                 <dt><a href="">About Us</a></dt>
//                  <dt><a href="./account-plan.html">Account Plans</a></dt>
//                 <dt><a href="./faq.html">FAQs</a></dt>
//                 <dt class="dropdown">
//                     <a href="">
//                         <span>Legal Documentation</span>
//                         <i class="fa-solid fa-chevron-down"></i>
//                     </a>

//                     <dl class="dropdown-menu d-flex flex-column r-g-15">
//                         <dt class="dropdown-item"><a href="">About Us</a></dt>
//                         <dt class="dropdown-item"><a href="">Account Plans</a></dt>
//                         <dt class="dropdown-item"><a href="">FAQs</a></dt>
//                     </dl>
//                 </dt>
//             </dl>
//         </nav>
//         <div class="contact-details d-flex g-20">
//             <p>Opening Hours Mon - Fri: 8AM to 6PM</p>
//             <a href="https://api.whatsapp.com/send?phone=01707101100" target="_blank">
//                 <i class="fa-brands fa-whatsapp"></i>
//                 <span>Whatsapp</span>
//             </a>
//             <a href="mailto:ahnafkhanhibban@outlook.com">
//                 <i class="fa-regular fa-envelope"></i>
//                 <span>Email</span>
//             </a>
//         </div>
//     </div>
// </div>
//             `,
//             footer: `
// <div class="container">
//     <div class="d-flex flex-wrap justify-content-between align-items-start r-g-10">
//         <div class="logo-area d-flex align-items-center g-4">
//             <img src="./assets/img/site-logo-footer.png" alt="Site Logo" class="site-logo">
//             <span class="site-name">Krust-Investments</span>
//         </div>
//         <div class="subscribe-area">
//             <p class="text">Subscribe To Our Newsletter</p>
//             <div class="input-area d-flex flex-wrap g-8">
//                 <div class="input-group">
//                             <input class="form-control" type="email" name="email" id="subscribeEmail" placeholder="Enter email here">
//                         </div>
//                 <a href="" class="btn">Subscribe</a>
//             </div>
//         </div>
//     </div>
//     <div class="footer-nav d-flex flex-wrap justify-content-between r-g-15">
//         <dl>
//             <dt><a href="">Company</a></dt>
//             <dt><a href="">Who We are</a></dt>
//             <dt><a href="">Contact Us</a></dt>
//             <dt><a href="">Legal Documentation</a></dt>
//         </dl>
//         <dl>
//             <dt><a href="">Product</a></dt>
//              <dt><a href="./account-plan.html">Account Plans</a></dt>
//         </dl>
//         <dl>
//             <dt class="text-end"><a href="./market-watch.html">Get started</a></dt>
//             <dt class="text-end"><a href="./login.html">Log in</a></dt>
//             <dt class="text-end"><a href="./signup.html">sign up</a></dt>
//         </dl>
//     </div>
//     <p class="footer-text text-center">&copy; 2024 Trust Investments. All Rights Reserved.</p>
// </div>
//             `,
//         },
//     };
//     const siteName = 'Krust-Investments';
// });

// Add nice 2 select for all the selects in the site
jQuery( document ).ready(function(){
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
});


