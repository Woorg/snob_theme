import Tabby from 'tabbyjs';

const tabs = () => {


    const tabSelectors = document.querySelectorAll('[data-tabs]');

    if (tabSelectors) {
     for (const [i, tabs] of [...tabSelectors].entries()) {
        tabs.setAttribute('data-tabs', i);
        new Tabby(`[data-tabs="${i}"]`);
      }
    }

    function toggleTabs(sel) {
      for ([i, tabs] of [...tabSelectors].entries()) {
        tabs = new Tabby(`[data-tabs="${i}"]`);
        document.querySelectorAll(sel).forEach(tab => tabs.toggle(tab));
      }
    }


}

export default tabs;