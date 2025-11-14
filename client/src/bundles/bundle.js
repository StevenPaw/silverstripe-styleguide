document.addEventListener('DOMContentLoaded', function() {
    // Dynamically build navigation based on preview sections
    function buildNavigation() {
        const sections = document.querySelectorAll('.section--preview');
        const navList = document.querySelector('.preview-nav-list');

        if (!navList || sections.length === 0) return;

        // Clear existing navigation
        navList.innerHTML = '';

        sections.forEach(section => {
            const sectionId = section.getAttribute('id');
            const sectionTitle = getSectionTitle(section);

            if (sectionId && sectionTitle) {
                const listItem = document.createElement('li');
                const link = document.createElement('a');

                link.href = '#' + sectionId;
                link.className = 'preview-nav-link';
                link.setAttribute('data-target', sectionId);
                link.textContent = sectionTitle;

                listItem.appendChild(link);
                navList.appendChild(listItem);
            }
        });
    }

    // Extract title from section content
    function getSectionTitle(section) {
        // Try to find the main heading in the section
        const headings = section.querySelectorAll('h1, h2, h3, h4, h5, h6');

        if (headings.length > 0) {
            // Get the first heading's text content, cleaned up
            let title = headings[0].textContent.trim();

            // Remove common prefixes and clean up
            title = title.replace(/^\d+\.\s*/, ''); // Remove "1. " style numbering
            title = title.replace(/^[-•]\s*/, ''); // Remove bullet points

            return title;
        }

        // Fallback: use section ID formatted nicely
        const sectionId = section.getAttribute('id');
        if (sectionId) {
            return sectionId.charAt(0).toUpperCase() + sectionId.slice(1).replace(/[-_]/g, ' ');
        }

        return 'Unnamed Section';
    }

    // Build navigation first
    buildNavigation();

    // Get updated references after building navigation
    const navLinks = document.querySelectorAll('.preview-nav-link');
    const sections = document.querySelectorAll('.section--preview');

    // Smooth scroll to sections
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('data-target');
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                // Update active link
                navLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');

                // Smooth scroll
                targetSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Highlight current section on scroll
    function updateActiveLink() {
        let current = '';
        sections.forEach(section => {
            const rect = section.getBoundingClientRect();
            if (rect.top <= 150 && rect.bottom >= 150) {
                current = section.getAttribute('id');
            }
        });

        if (current) {
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('data-target') === current) {
                    link.classList.add('active');
                }
            });
        }
    }

    // Update active link on scroll
    window.addEventListener('scroll', updateActiveLink);

    // Set initial active link
    updateActiveLink();
});
