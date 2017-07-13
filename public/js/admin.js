/**
 * Admin functions for the dashboard and other admin functionalities
 */


$(document).ready(function () {
    var tabs = $('li[role="presentation"]');
    tabs.click(function() {
        update(this);
    });

    var hash = window.location.hash.substr(1);
    if (hash != "") {
        var tab = $('a[aria-controls="'+hash+'"]')[0].parentElement;
        update(tab);
    }
});

function update(activeTab) {
    // First update the tabs
    var tabs = $('li[role="presentation"]');
    tabs.each(function() {
        tabSetSelected(this, 'false');
    });
    tabSetSelected(activeTab, 'true');

    // Then update its content
    var tabsContent = $('div[role="tabpanel"]');
    tabsContent.each(function() {
        this.setAttribute('aria-hidden', 'true');
        this.setAttribute('class', 'tabs-panel');
    });
    panelId = activeTab.firstElementChild.getAttribute('aria-controls');
    panel = document.getElementById(panelId);
    panel.setAttribute('aria-hidden', 'false');
    panel.setAttribute('class', 'tabs-panel is-active');
}

// Set the e
function tabSetSelected(tab, selected) {
    tab.setAttribute('class', selected === 'true' ? 'tabs-title is-active' : 'tabs-title');
    tab.firstElementChild.setAttribute('aria-selected', selected);
}
