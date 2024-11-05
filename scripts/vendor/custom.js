const HSThemeAppearance = {init() {var e = localStorage.getItem("hs_theme") || "default"; document.querySelector("html").classList.contains("dark") || this.setAppearance(e)}, _resetStylesOnLoad() {var e = document.createElement("style"); return e.innerText = "*{transition: unset !important;}", e.setAttribute("data-hs-appearance-onload-styles", ""), document.head.appendChild(e), e}, setAppearance(e, a = !0, t = !0) {const r = this._resetStylesOnLoad(); a && localStorage.setItem("hs_theme", e), "auto" === e && (e = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "default"), document.querySelector("html").classList.remove("dark"), document.querySelector("html").classList.remove("default"), document.querySelector("html").classList.remove("auto"), document.querySelector("html").classList.add(this.getOriginalAppearance()), setTimeout(() => {r.remove()}), t && window.dispatchEvent(new CustomEvent("on-hs-appearance-change", {detail: e}))}, getAppearance() {let e = this.getOriginalAppearance(); return e = "auto" === e ? window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "default" : e}, getOriginalAppearance() {return localStorage.getItem("hs_theme") || "default"} }; HSThemeAppearance.init(), window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", () => {"auto" === HSThemeAppearance.getOriginalAppearance() && HSThemeAppearance.setAppearance("auto", !1)}), window.addEventListener("load", () => {var e = document.querySelectorAll("[data-hs-theme-click-value]"); const t = document.querySelectorAll("[data-hs-theme-switch]"); e.forEach(e => {e.addEventListener("click", () => HSThemeAppearance.setAppearance(e.getAttribute("data-hs-theme-click-value"), !0, e))}), t.forEach(e => {e.addEventListener("change", e => {HSThemeAppearance.setAppearance(e.target.checked ? "dark" : "default")}), e.checked = "dark" === HSThemeAppearance.getAppearance()}), window.addEventListener("on-hs-appearance-change", a => {t.forEach(e => {e.checked = "dark" === a.detail})})});
