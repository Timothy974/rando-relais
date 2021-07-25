const mode = {
  // Proprietes availables in the object.
  backgroundColorByDefault: null,
  backgroundColor: [],
  switch: null,
  clickedSwitch: null,
  body: null,
  init: function () {
    console.log("Hello ! I'm the mode component.");

    // We get the DOM elements that we need to interate with.
    // We add a listener & a handler on the click evt on each of them.

    mode.switch = document.querySelector(".switch");
    if (mode.switch) {
      mode.switch.addEventListener(
        "click",
        mode.handleSelectBackgroundColorSwitch
      );
    }

    // We get all the DOM elements that will be impacted by the handleSelectBackgroundColorSwitch() method.

    // The body element.
    mode.body = document.body;
    // TODO START : add some code to get the other DOM elements impacted...

    // TODO END.

    // When the page is charged we load to the page the backgroundColor wich is backup in localSatorage.
    mode.loadMode();
  },
  // Method who get the backgroundColor wich is back up in localStorage and call the switchBackgroundColor() method to change the color with the value of backgroundColor.
  loadMode: function () {
    // We get the value backup in localStorage.
    mode.backgroundColor = localStorage.getItem("mode");

    // If backgroundColor === true.
    if (mode.backgroundColor) {
      // We call the switchBackgroundColor() method to change the font color with the value of backgroundColor.
      mode.switchBackgroundColor(mode.backgroundColor);
    } // Else backgroundColor === false.
    else if (mode.backgroundColor === false) {
      // We set a value to backgroundColor in localStorage.
      mode.backgroundColorByDefault = localStorage.setItem("mode", "light");
      // We call the switchBackgroundColor() method to change the font color with the value of backgroundColor.
      mode.switchBackgroundColor(mode.backgroundColorByDefault);
    } // Else just in case.
    else {
      // We stop the execution of the condition.
      return;
    }
  },
  // Method who get the DOM element on wich we click, get the value of the Item backup in localStorage, backup a new Item value in localStorage, set this new value for the backgroundColor and call the switchElementsColor() method with backgroundColor in argument.
  handleSelectBackgroundColorSwitch: function (evt) {
    // We get the DOM element from wich the event occured.
    mode.clickedSwitch = evt.currentTarget;
    console.log("You clicked !");

    // If the mode backup in localStorage have the light value.
    if (localStorage.getItem("mode") === "light") {
      // We backup in localStorage the new value of the mode.
      localStorage.setItem("mode", "dark");
      // We set the value dark to backgroundColor.
      mode.backgroundColor = "dark";
      // We call the switchBackgroundColor() method to change the background color with the backgroundColor in argument.
      mode.switchBackgroundColor(mode.backgroundColor);
    } // Else if the mode backup in localStorage have the dark value.
    else if (localStorage.getItem("mode") === "dark") {
      // We backup in localStorage the new value of the mode.
      localStorage.setItem("mode", "light");
      // We set the value dark to backgroundColor.
      mode.backgroundColor = "light";
      // We call the switchBackgroundColor() method to change the background color with the backgroundColor in argument.
      mode.switchBackgroundColor(mode.backgroundColor);
      // Else just in case. 
    } else {
      // We stop the execution of the condition.
      return;
    }
  },
  // Method who handle the color switch of the background.
  switchBackgroundColor: function (newBackgroundColor) {
    // We use the JS API classList to with the classes of the DOM elements.
    // If the backgroundColor is different than the backgroundColorByDefault we toggle the correspondent class to the DOM elements.
    if (newBackgroundColor !== mode.backgroundColorByDefault) {
      mode.body.classList.toggle(newBackgroundColor);
    }
  },
};
