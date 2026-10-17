(() => {
  function normalise(value) { return String(value || '').trim(); }
  function initials(name) { return normalise(name).split(/\s+/).filter(Boolean).slice(0, 2).map(part => part.charAt(0).toUpperCase()).join('') || 'M'; }
  function render(element, url, name) {
    if (!element) return;
    const source = normalise(url).replace('/storage/', '/media/');
    element.classList.toggle('avatar-empty', !source);
    element.innerHTML = source ? `<img src="${source.replace(/&/g, '&amp;').replace(/"/g, '&quot;')}" alt="">` : initials(name);
  }
  window.MemberAvatar = { render, initials, normalise };
})();
