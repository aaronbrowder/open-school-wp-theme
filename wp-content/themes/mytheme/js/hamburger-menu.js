document.addEventListener('DOMContentLoaded', hamburgerMenu, false);

function hamburgerMenu() {

   var isMenuExpanded = false;
   
   var hamburgerId = 'hamburger';
   var mainMenuId = 'main-menu';
   var menuItemClassName = 'header-menu-item';

   var hamburger = document.getElementById(hamburgerId);
   var mainMenu = document.getElementById(mainMenuId);
   var menuItems = mainMenu.getElementsByClassName(menuItemClassName);

   function collapseMenu() {
      isMenuExpanded = false;
      hamburger.classList.remove('expanded');
      mainMenu.classList.remove('visible');
      for (var i = 0; i < menuItems.length; i++) {
         var menuItem = menuItems[i];
         menuItem.classList.remove('expanded');
      }
   }

   function hasAncestorWithId(el, id) {
      while (el) {
         if (el.id === id) return true;
         el = el.parentElement;
      }
      return false;
   }

   window.onresize = function() {
      collapseMenu();
   };

   document.addEventListener('click', function(event) {
      if (isMenuExpanded) {
         var isClickInsideMenu = !!hasAncestorWithId(event.target, mainMenuId);
         if (!isClickInsideMenu) {
            var isClickInsideButton = !!hasAncestorWithId(event.target, hamburgerId);
            if (!isClickInsideButton) collapseMenu();
         }
      }
   });

   hamburger.addEventListener('click', function(event) {
      isMenuExpanded = !isMenuExpanded;
      hamburger.classList.toggle('expanded');
      mainMenu.classList.toggle('visible');
      event.preventDefault();
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
