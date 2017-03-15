canvas               = O('logo')
context              = canvas.getContext('2d')
context.font         = 'bold  97px SimHei'
context.textBaseline = 'top'
image                = new Image()
image.src            = 'logo.jpg'

image.onload = function()
{
  gradient = context.createLinearGradient(0, 0, 0, 89)
  gradient.addColorStop(0.00, '#66B3FF')
  gradient.addColorStop(0.66, '#0080FF')
  context.fillStyle = gradient
  context.fillText(  "张江大学图书馆", 0, 0)
  context.strokeText("张江大学图书馆", 0, 0)
  //context.drawImage(image, 64, 32)
}

function O(i) { return typeof i == 'object' ? i : document.getElementById(i) }
function S(i) { return O(i).style                                            }
function C(i) { return document.getElementsByClassName(i)                    }
