// class Nav {
//     constructor() {
//         this.$ctaButton = document.querySelector('.feedback__сta')
//         this.$navTrigger = document.querySelector('.nav__trigger')
//         this.$nav = document.querySelector('.nav_primary')
//         this.events()
//         this.modalOpen = false
//     }

//     // events
//     events() {

//         this.$ctaButton.addEventListener( 'click', (e) => {

//             if ( this.navOpen ) {

//                 // this.navOpen = true
//                 this.closeNav()

//             } else {
//                 // this.navOpen = false
//                 this.openNav()
//             }

//         })

//     }

//     openModal() {
//         this.$header.classList.add('header_nav-open')
//         this.$navTrigger.classList.add('nav__trigger_active')
//         this.$nav.classList.add('nav_open')
//         this.$page.classList.add('page_nav_open')

//         this.navOpen = true
//         console.log('open')
//     }

//     closeModal() {
//         this.$header.classList.remove('header_nav-open')
//         this.$navTrigger.classList.remove('nav__trigger_active')
//         this.$nav.classList.remove('nav_open')
//         this.$page.classList.remove('page_nav_open')

//         this.navOpen = false
//         console.log('close')
//     }


//     // methods




// }


// export default Nav




// client.$document.on('click', ctrl.tagBtnClose, function(e) {
//           e.preventDefault();

//           var id = $(this).closest('.modal').data('modal');

//           ctrl.close(id);

//         });

//         client.$document.on('click', ctrl.tagBtnOpen, function(e) {
//           e.preventDefault();

//           var id = $(this).data('modal-open');

//           ctrl.open(id);

//         });
