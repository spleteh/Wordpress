$(function () {
$(‘.ddsmoothmenu’).each(function () {
$(this).parent().eq(0).hover(function () {
$(‘.ddsmoothmenu:eq(0)’, this).show();
}, function () {
$(‘.ddsmoothmenu:eq(0)’, this).hide();
});
});
});