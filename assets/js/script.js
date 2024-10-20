
// tailwind config

tailwind.config = {
    theme: {
        extend: {
            fontFamily: {
                inter: ['Inter', 'sans-serif'],
            },
            animation: {
                'infinite-scroll': 'infinite-scroll 25s linear infinite',
            },
            keyframes: {
                'infinite-scroll': {
                    from: { transform: 'translateX(0)' },
                    to: { transform: 'translateX(-100%)' },
                }
            }                    
        },
    },
};



// index


// Get the scrollable container
const container = document.getElementById('scroll-container');

  // Scroll Left function
  function scrollToLeft() {
      container.scrollBy({
          left: -300, // Adjust the value as needed to control the scroll distance
          behavior: 'smooth' // Smooth scroll
      });
  }

  // Scroll Right function
  function scrollToRight() {
      container.scrollBy({
          left: 300, // Adjust the value as needed to control the scroll distance
          behavior: 'smooth' // Smooth scroll
      });
}
