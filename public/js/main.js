$(document).ready(function(){
function CopyToClipboard(t){var i=$("#_hiddenClipboard_");i.length||($("body").append('<textarea style="position:absolute;top: -9999px;" id="_hiddenClipboard_"></textarea>'),i=$("#_hiddenClipboard_")),i.html(t),i.select(),document.execCommand("copy"),document.getSelection().removeAllRanges()}$.fn.CopyToClipboard=function(){CopyToClipboard(this.is("select")||this.is("textarea")||this.is("input")?this.val():this.text())},$(function(){$("[data-clipboard-target]").each(function(){$(this).click(function(){$($(this).data("clipboard-target")).CopyToClipboard()})}),$("[data-clipboard-text]").each(function(){$(this).click(function(){CopyToClipboard($(this).data("clipboard-text"))})})});

$('#copy').CopyToClipboard();



});
