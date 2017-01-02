document.addEventListener('DOMContentLoaded', hamburgerMenu, false);

function hamburgerMenu() {

   var isMenuExpanded = false;

   var hamburger = document.getElementById('hamburger');
   var mainMenu = document.getElementById('main-menu');
   var menuItems = mainMenu.getElementsByClassName('header-menu-item');

   window.onresize = function() {
      isMenuExpanded = false;
      hamburger.classList.remove('expanded');
      mainMenu.classList.remove('visible');
      for (var i = 0; i < menuItems.length; i++) {
         var menuItem = menuItems[i];
         menuItem.classList.remove('expanded');
      }
   };

   hamburger.addEventListener('click', function() {
      isMenuExpanded = !isMenuExpanded;
      hamburger.classList.toggle('expanded');
      mainMenu.classList.toggle('visible');
   });

   for (var i = 0; i < menuItems.length; i++) {
      var menuItem = menuItems[i];
      registerMenuItemExpandEvent(menuItem);
   }

   function registerMenuItemExpandEvent(menuItem) {
      var link = menuItem.getElementsByTagName('a')[0];
      var subList = menuItem.getElementsByTagName('ul')[0];
      link.addEventListener('click', function(e) {
         // if this is not in the hamburger menu or there are no sub-menu-items,
         // we just want to follow the link like normal
         if (!isMenuExpanded || !subList) return true;
         menuItem.classList.toggle('expanded');
         e.preventDefault();
         return false;
      });
   }
}
