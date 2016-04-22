# JavaScript for the parallax effect on: Cria Ideias Web site
# Author: Gustavo Guichard
# Author URL: http://www.gustavoguichard.com/
$(document).ready ->
  #  This Function is based on Ian Lunn's function from Recreating the Nikebetterworld.com Parallax Demo
  newPos = (height, pos, adjuster, inertia, max, rev) ->
    if pos > 0
      result = (-((height + pos) - adjuster) * (inertia))
      unless typeof max is "undefined"
        if rev is true and result >= max
          result
        else result  if rev isnt true and result <= max
      else
        result
  
  rotateElement = ($el, $deg) ->
    $el.css
      "-moz-transform": "rotate(" + $deg + "deg)"
      "-webkit-transform": "rotate(" + $deg + "deg)"
      "-o-transform": "rotate(" + $deg + "deg)"
      transform: "rotate(" + $deg + "deg)"

    return
  
  $window = $(window)
  $body = $("body")
  windowHeight = $window.height()
  windowWidth = $window.width()
  docHeight = $(document).height()
  scrollMoving = ""
  pos = 0

  # PARALLAX ESPACO
  if $body.hasClass("espaco")
    $astro = $("#img_astronauta")
    $nave = $("#img_nave")
    $planeta_nw = $("#img_planeta_nw")
    $planeta_ne = $("#img_planeta_ne")
    scrollMoving = ->
      pos = $window.scrollTop()
      pos = 1 if pos < 1
      $astro.css
        top: newPos(windowHeight, pos, 1550, 0.1) + "%"
        right: newPos(windowHeight, pos, 850, -0.03) + "%"

      $nave.css left: newPos(windowHeight, pos, 830, -2) + "px"
      $planeta_nw.css top: newPos(windowHeight, pos, 0, 0.18) + "px"
      $planeta_ne.css right: newPos(windowHeight, pos, 0, 0.04) + "px"
      degs = (pos * 100) / (docHeight - windowHeight) - 70
      rotateElement $astro, degs

  # PARALLAX OCEANO
  else if $body.hasClass("oceano")
    $tubarao = $("#img_tubarao")
    $navio = $("#img_navio")
    $coral_sw = $("#img_coral_sw")
    $coral_se = $("#img_coral_se")
    scrollMoving = ->
      pos = $window.scrollTop()
      pos = 1 if pos < 1
      $coral_se.css
        right: newPos(windowHeight, pos, 700, 0.08, -80, true) + "px"
        bottom: newPos(windowHeight, pos, 700, 0.05, -50, true) + "px"

      $coral_sw.css
        left: newPos(windowHeight, pos, 700, 0.08, -80, true) + "px"
        bottom: newPos(windowHeight, pos, 700, 0.05, -50, true) + "px"

      $navio.css bottom: newPos(windowHeight, pos, -1400, -0.05, 150) + "px"
      $tubarao.css right: newPos(windowHeight, pos, 1050, -3) + "px"

  # PARALLAX INVADERS
  else if $body.hasClass("invaders")
    $city = $("#img_city")
    $dinosaur = $("#img_dinosaur")
    $robot = $("#img_robot")
    $invader = $("#img_invader")
    scrollMoving = ->
      pos = $window.scrollTop()
      pos = 1 if pos < 1
      $city.css bottom: newPos(windowHeight, pos / 3, 2000, -0.01, 0) + "%"
      $dinosaur.css right: newPos(windowWidth, pos / 2, 1500, -.5) + "px"
      $robot.css
        bottom: newPos(windowHeight, pos / 2, 300, -.3, 230) + "px"
      $invader.css right: newPos(windowWidth, pos / 2, 1300, -2.5) + "px"

  # PARALLAX MEDIEVAL
  else if $body.hasClass("medieval")
    $colinas = $("#img_colinas")
    $colinas_bg = $("#img_colinas_bg")
    $montanha = $("#img_montanha")
    $montanha_bg = $("#img_montanha_bg")
    $yeti = $("#img_yeti")
    $warrior = $("#img_warrior")
    $dragao = $("#img_dragao")
    scrollMoving = ->
      pos = $window.scrollTop()
      pos = 1 if pos < 1
      $colinas.css bottom: newPos(windowHeight, pos / 3, 1000, -0.01, 0) + "%"
      $colinas_bg.css bottom: newPos(windowHeight, pos / 3, 800, 0.01, -4, true) + "%"
      $montanha.css
        bottom: newPos(windowHeight, pos / 3, 1100, 0.02, 0, true) + "%"
        left: newPos(windowHeight, pos, 700, 0.02, -26, true) + "px"

      $montanha_bg.css
        bottom: newPos(windowHeight, pos / 3, 2000, 0.01, 7, true) + "%"
        left: newPos(windowHeight, pos, 640, 0.01, -22, true) + "px"

      $yeti.css
        bottom: newPos(windowHeight, pos / 3, 1550, 0.025, 11, true) + "%"
        right: newPos(windowHeight, pos, 700, 0.07, -85, true) + "px"

      $warrior.css
        left: newPos(windowHeight, pos, 0, -0.1) + "px"


  $window.resize ->
    windowHeight = $window.height()
    windowWidth = $window.width()
    scrollMoving()

  $window.bind "scroll", scrollMoving
  scrollMoving()