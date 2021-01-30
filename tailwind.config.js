const colors = require("tailwindcss/colors");
module.exports = {
    future: {
        removeDeprecatedGapUtilities: true,
        purgeLayersByDefault: true
    },
    purge: ["./resources/views/**/*.blade.php", "./resources/js/**/*.vue"],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                coolGray: colors.coolGray,
                violet: colors.violet,
                warmGray: colors.warmGray,
                primary: "var(--primary)",
                "primary-light": "var(--primary-light)",
                "primary-lighter": "var(--primary-lighter)",
                "primary-dark": "var(--primary-dark)",
                "on-primary": "var(--on-primary)",
                "on-primary-dark": "var(--on-primary-dark)",
                "hover-primary": "var(--hover-primary)",
                "hover-on-primary": "var(--hover-on-primary)",
                //
                secondary: "var(--secondary)",
                "on-secondary": "var(--on-secondary)",
                "hover-secondary": "var(--hover-secondary)",
                "hover-on-secondary": "var(--hover-on-secondary)",
                //
                accent: "var(--accent)",
                "on-accent": "var(--on-accent)",
                "hover-accent": "var(--hover-accent)",
                "hover-on-accent": "var(--hover-on-accent)",
                //
                background: "var(--background)",
                "on-background": "var(--on-background)",
                //
                main: "var(--main)",
                "on-main": "var(--on-main)",
                "on-accent-main": "var(--on-accent-main)",
                "main-dark": "var(--main-dark)",
                "on-main-dark": "var(--on-main-dark)",
                //
                "main-two": "var(--main-two)",
                "on-main-two": "var(--on-main-two)",
                "on-accent-main-two": "var(--on-accent-main-two)",
                //
                "main-three": "var(--main-three)",
                "on-main-three": "var(--on-main-three)",
                "on-accent-main-three": "var(--on-accent-main-three)",
                //
                header: "var(--header)",
                "on-header": "var(--on-header)",
                "header-border": "var(--header-border)",
                "header-link": "var(--header-link)",
                "header-on-link": "var(--header-on-link)",
                "hover-header": "var(--hover-header)",
                "hover-on-header": "var(--hover-on-header)",
                "header-avatar": "var(--header-avatar)",
                "header-on-avatar": "var(--header-on-avatar)",
                "header-bg-image": "var(--header-bg-image)",
                "header-text-image": "var(--header-text-image)",
                //
                "accordion-not-open": "var(--accordion-not-open)",
                "accordion-on-not-open": "var(--accordion-on-not-open)",
                "accordion-open": "var(--accordion-open)",
                "accordion-on-open": "var(--accordion-on-open)",
                //
                "footer-from": "var(--footer-from)",
                "footer-to": "var(--footer-to)",
                "on-footer": "var(--on-footer)",
                "hover-footer": "var(--hover-footer)",
                "hover-on-footer": "var(--hover-on-footer)",
                //
                form: "var(--form)",
                "on-form": "var(--on-form)",
                "box-form": "var(--box-form)",
                "on-box-form": "var(--on-box-form)",
                "hover-form": "var(--hover-form)",
                "hover-on-form": "var(--hover-on-form)"
            }
        }
    },
    variants: {},
    plugins: []
};
