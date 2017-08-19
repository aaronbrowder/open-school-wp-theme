document.addEventListener('DOMContentLoaded', contextMenu, false);
document.addEventListener('DOMContentLoaded', hamburgerMenu, false);
document.addEventListener('DOMContentLoaded', bannerLoader, false);

function bannerLoader() {
   
   var loaders = document.getElementsByClassName('home-banner-loader');
   
   setUpLoader(0);
   setUpLoader(1);
   setUpLoader(2);
   setUpLoader(3);
   setUpLoader(4);
   setUpLoader(5);
   
   function setUpLoader(index) {
      if (loaders.length > index) {
         var loader = loaders[index];
         loader.onload = function() { 
            loader.classList.add('loaded');
            loader.parentElement.querySelector('.home-banner-placeholder').style.display = 'none';
         };
         // must set src after registering onload, or else onload won't fire if the image is cached
         loader.setAttribute('src', loader.getAttribute('data-src'));
      }
   }
}

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

function contextMenu() {
   
   var menuItems = document.getElementsByClassName('header-menu-item has-children');
   for (var i = 0; i < menuItems.length; i++) {
      registerEvents(menuItems[i], function() {
         closeAllContextMenus(menuItems);
      });
   }

   function closeAllContextMenus(menuItems) {
      for (var i = 0; i < menuItems.length; i++) {
         var contextMenu = getContextMenu(menuItems[i]);
         if (contextMenu) {
            contextMenu.classList.remove('visible');
         }
      }
   }

   function registerEvents(menuItem, closeAllContextMenusCallback) {
      var contextMenu = getContextMenu(menuItem);
      if (contextMenu) {
         var isClosing = false;
         menuItem.addEventListener('mouseover', function() {
            closeAllContextMenusCallback();
            isClosing = false;
            contextMenu.classList.add('visible');
         });
         menuItem.addEventListener('mouseleave', function() {
            isClosing = true;
            setTimeout(function() {
               if (isClosing) {
                  contextMenu.classList.remove('visible');
               }
            }, 50);
         });
         menuItem.addEventListener('click', function() {
            closeAllContextMenusCallback();
         });
      }
   }

   function getContextMenu(menuItem) {
      var contextMenus = menuItem.getElementsByClassName('header-context-menu');
      return contextMenus.length ? contextMenus[0] : null;
   }

}
