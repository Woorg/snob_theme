function Parallax () {

  // let background = document.querySelector(".hero__image");
  // let person = document.querySelector(".person");
  // let mountain = document.querySelector(".hero__bg");
  // let smoke1 = document.querySelector(".smoke1");
  // let smoke2 = document.querySelector(".smoke2");
  let text = document.querySelector(".hero__image");
  // let cover = document.querySelector(".cover");
  // let header = document.querySelector("header");

  const scrollHandle = (e) => {
    let scroll = window.scrollY;

    text.style.transform = `translate(-50%, -50%) translate3d(0, ${
      scroll * 0.55
    }px, 0)`;
    // background.style.transform = `translate3d(0, ${scroll * 0.9}px, 0)`;
    // mountain.style.transform = `translate3d(0, ${scroll * 0.35}px, 0)`;
    // smoke1.style.transform = `translate3d(0, ${scroll * 0.7}px, 0)`;
    // smoke2.style.transform = `translate3d(0, ${scroll * 0.3}px, 0)`;
    // person.style.transform = `translate3d(0, ${scroll * 0.25}px, 0)`;
  };

  window.addEventListener("scroll", scrollHandle);

}

// 0.85

export default Parallax
