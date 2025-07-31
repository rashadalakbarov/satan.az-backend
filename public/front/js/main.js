document.addEventListener("DOMContentLoaded", function () {
    const phoneInput = document.getElementById("phone");

    phoneInput.addEventListener("input", function (e) {
        let digits = e.target.value.replace(/\D/g, "");

        // Zorunlu olarak 994 ile başlat
        if (!digits.startsWith("994")) {
            digits = "994";
        }

        // Sadece 12 hane: 994 + 9 rakam
        digits = digits.slice(0, 12);

        // Formatla
        let formatted = "+" + digits.slice(0, 3); // +994
        if (digits.length > 3) formatted += digits.slice(3, 5); // +99455
        if (digits.length > 5) formatted += " " + digits.slice(5, 8); // +99455 821
        if (digits.length > 8) formatted += " " + digits.slice(8, 10); // +99455 821 56
        if (digits.length > 10) formatted += " " + digits.slice(10, 12); // +99455 821 56 73

        e.target.value = formatted;
    });

    // Başlangıçta otomatik +994 koy
    phoneInput.value = "+994";
});
