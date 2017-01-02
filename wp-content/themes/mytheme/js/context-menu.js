document.addEventListener('DOMContentLoaded', contextMenu, false);

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
