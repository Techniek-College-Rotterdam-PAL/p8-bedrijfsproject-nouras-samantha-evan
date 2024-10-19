export function toggleDropdown() {
    const dropdown = document.getElementById('dropdownMenu');
    dropdown.classList.toggle('hidden');
}

window.onclick = function(event) {
    if (!event.target.matches('.py-2.px-4')) {
        const dropdown = document.getElementById('dropdownMenu');
        if (!dropdown.classList.contains('hidden')) {
            dropdown.classList.add('hidden');
        }
    }
};
