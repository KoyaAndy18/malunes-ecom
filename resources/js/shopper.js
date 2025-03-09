<script>
document.addEventListener("DOMContentLoaded", function () {
    let navbar = document.getElementById("mainNavbar");

    // Shrink Navbar on Scroll
    window.addEventListener("scroll", function () {
        if (window.scrollY > 50) {
            navbar.classList.add("shrink");
        } else {
            navbar.classList.remove("shrink");
        }
    });

    // GSAP Animation on Page Load
    gsap.from(".navbar", { duration: 1, y: -50, opacity: 0, ease: "power2.out" });
});
</script>
