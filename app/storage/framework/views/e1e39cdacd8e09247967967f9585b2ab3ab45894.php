<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | ATU Tracer</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('font/iconsmind-s/css/iconsminds.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('font/simple-line-icons/css/simple-line-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap.rtl.only.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap-float-label.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/perfect-scrollbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/select2-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap-datepicker3.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/jquery.contextMenu.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/component-custom-switch.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/dore.light.bluenavy.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">

    <style>
        .theme-colors {
            display: none;
        }

        .survey-filter:hover {
            cursor: pointer;
        }

    </style>
</head>

<body id="app-container" class="menu-sub-hidden show-spinner right-menu">


    <?php echo $__env->make('inc.dashboard.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->make('inc.dashboard.side-bar', ['surveys' => $allSurveys], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    
    



    <?php $__env->startSection('survey-tiles'); ?>
        <?php $__currentLoopData = $allSurveys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $survey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('inc.dashboard.survey.survey-tile', ['survey' => $survey, 'status' => $survey->status], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('stat'); ?>
        <li class="active"><a href="#"> All Surveys <span
                    class="float-right"><?php echo e($allSurveys->count()); ?></span></a></li>
        <li><a href="#"> Deployed Surveys <span
                    class="float-right"><?php echo e($allSurveys->where('status_id', '2')->count()); ?></span></a></li>
        <li><a href="#"> Drafted Surveys <span
                    class="float-right"><?php echo e($allSurveys->where('status_id', '1')->count()); ?></span></a></li>
        <li><a href="#"> Archived Surveys <span
                    class="float-right"><?php echo e($allSurveys->where('status_id', '3')->count()); ?></span></a></li>
        <li><a href="#"> Submitted Surveys <span class="float-right">null</span></a></li>

        <a class="archive-warning" style="display: none" data-toggle="modal" href="#archiveWarning">test dialog</a>
        <a class="deploy-warning" style="display: none" data-toggle="modal" href="#deployWarning">test dialog</a>
        <a class="delete-warning" style="display: none" data-toggle="modal" href="#deleteWarning">test dialog</a>

        <form action="<?php echo e(route('survey.view-response')); ?>" method="post" id="view-response" style="display: none">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="survey_id" class="survey_id">
            <input type="submit" class="submit">
        </form>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('survey-form'); ?>
        <?php echo $__env->make('inc.dashboard.survey.survey-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>


    <script src="<?php echo e(asset('js/vendor/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/select2.full.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/mousetrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/jquery.contextMenu.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dore.script.js')); ?>"></script>

    <script>
        function loadStyle(e, t) {
            for (var o = 0; o < document.styleSheets.length; o++)
                if (document.styleSheets[o].href == e) return;
            var a = document.getElementsByTagName("head")[0],
                r = document.createElement("link");
            (r.rel = "stylesheet"),
            (r.type = "text/css"),
            (r.href = '<?php echo e(asset('')); ?>' + e),
            t &&
                (r.onload = function() {
                    t();
                });
            var l = $(a).find('[href$="main.css"]');
            0 !== l.length ? l[0].before(r) : a.appendChild(r);
        }!(function(e) {
            e().dropzone && (Dropzone.autoDiscover = !1);
            try {
                localStorage.setItem("dore-is-private-tab", !1);
                e("body").append(
                    '\n  <div class="theme-colors">\n    <div class="p-4">\n    <p class="text-muted mb-2">Light Theme</p>\n    <div class="d-flex flex-row justify-content-between mb-3">\n      <a href="#" data-theme="dore.light.bluenavy.min.css" class="theme-color theme-color-bluenavy"></a>\n      <a href="#" data-theme="dore.light.blueyale.min.css" class="theme-color theme-color-blueyale"></a>\n      <a href="#" data-theme="dore.light.blueolympic.min.css" class="theme-color theme-color-blueolympic"></a>\n      <a href="#" data-theme="dore.light.greenmoss.min.css" class="theme-color theme-color-greenmoss"></a>\n      <a href="#" data-theme="dore.light.greenlime.min.css" class="theme-color theme-color-greenlime"></a>\n    </div>\n    <div class="d-flex flex-row justify-content-between mb-4">\n      <a href="#" data-theme="dore.light.purplemonster.min.css" class="theme-color theme-color-purplemonster"></a>\n      <a href="#" data-theme="dore.light.orangecarrot.min.css" class="theme-color theme-color-orangecarrot"></a>\n      <a href="#" data-theme="dore.light.redruby.min.css" class="theme-color theme-color-redruby"></a>\n      <a href="#" data-theme="dore.light.yellowgranola.min.css" class="theme-color theme-color-yellowgranola"></a>\n      <a href="#" data-theme="dore.light.greysteel.min.css" class="theme-color theme-color-greysteel"></a>\n    </div>\n    <p class="text-muted mb-2">Dark Theme</p>\n    <div class="d-flex flex-row justify-content-between mb-3">\n      <a href="#" data-theme="dore.dark.bluenavy.min.css" class="theme-color theme-color-bluenavy"></a>\n      <a href="#" data-theme="dore.dark.blueyale.min.css" class="theme-color theme-color-blueyale"></a>\n      <a href="#" data-theme="dore.dark.blueolympic.min.css" class="theme-color theme-color-blueolympic"></a>\n      <a href="#" data-theme="dore.dark.greenmoss.min.css" class="theme-color theme-color-greenmoss"></a>\n      <a href="#" data-theme="dore.dark.greenlime.min.css" class="theme-color theme-color-greenlime"></a>\n    </div>\n    <div class="d-flex flex-row justify-content-between">\n    <a href="#" data-theme="dore.dark.purplemonster.min.css" class="theme-color theme-color-purplemonster"></a>\n    <a href="#" data-theme="dore.dark.orangecarrot.min.css" class="theme-color theme-color-orangecarrot"></a>\n    <a href="#" data-theme="dore.dark.redruby.min.css" class="theme-color theme-color-redruby"></a>\n    <a href="#" data-theme="dore.dark.yellowgranola.min.css" class="theme-color theme-color-yellowgranola"></a>\n    <a href="#" data-theme="dore.dark.greysteel.min.css" class="theme-color theme-color-greysteel"></a>\n  </div>\n  </div>\n  <div class="p-4">\n    <p class="text-muted mb-2">Border Radius</p>\n    <div class="custom-control custom-radio custom-control-inline">\n      <input type="radio" id="roundedRadio" name="radiusRadio" class="custom-control-input radius-radio" data-radius="rounded">\n      <label class="custom-control-label" for="roundedRadio">Rounded</label>\n    </div>\n    <div class="custom-control custom-radio custom-control-inline">\n      <input type="radio" id="flatRadio" name="radiusRadio" class="custom-control-input radius-radio" data-radius="flat">\n      <label class="custom-control-label" for="flatRadio">Flat</label>\n    </div>\n  </div>\n  <div class="p-4">\n    <p class="text-muted mb-2">Direction</p>\n    <div class="custom-control custom-radio custom-control-inline">\n    <input type="radio" id="ltrRadio" name="directionRadio" class="custom-control-input direction-radio" data-direction="ltr">\n    <label class="custom-control-label" for="ltrRadio">Ltr</label>\n  </div>\n  <div class="custom-control custom-radio custom-control-inline">\n    <input type="radio" id="rtlRadio" name="directionRadio" class="custom-control-input direction-radio" data-direction="rtl">\n    <label class="custom-control-label" for="rtlRadio">Rtl</label>\n  </div>\n</div>\n<a href="#" class="theme-button"> <i class="simple-icon-magic-wand"></i> </a>\n</div>\n'
                );
            } catch (e) {}
            var t = "dore.light.bluenavy.min.css",
                o = "ltr",
                a = "rounded";
            try {
                localStorage.getItem("dore-theme-color") ? (t = localStorage.getItem("dore-theme-color")) : localStorage
                    .setItem("dore-theme-color", t),
                    localStorage.getItem("dore-direction") ? (o = localStorage.getItem("dore-direction")) : localStorage
                    .setItem("dore-direction", o),
                    localStorage.getItem("dore-radius") ? (a = localStorage.getItem("dore-radius")) : localStorage
                    .setItem("dore-radius", a);
            } catch (e) {
                (t = "dore.light.bluenavy.min.css"), (o = "ltr"), (a = "rounded");
            }

            function r() {
                e("body").addClass(o), e("html").attr("dir", o), e("body").addClass(a), e("body").dore();
            }
            e(".theme-color[data-theme='" + t + "']").addClass("active"),
                e(".direction-radio[data-direction='" + o + "']").attr("checked", !0),
                e(".radius-radio[data-radius='" + a + "']").attr("checked", !0),
                e("#switchDark").attr("checked", t.indexOf("dark") > 0),
                loadStyle("css/" + t, function() {
                    setTimeout(r, 300);
                }),
                e("body").on("click", ".theme-color", function(t) {
                    t.preventDefault();
                    var o = e(this).data("theme");
                    try {
                        localStorage.setItem("dore-theme-color", o), window.location.reload();
                    } catch (e) {}
                }),
                e("input[name='directionRadio']").on("change", function(t) {
                    var o = e(t.currentTarget).data("direction");
                    try {
                        localStorage.setItem("dore-direction", o), window.location.reload();
                    } catch (e) {}
                }),
                e("input[name='radiusRadio']").on("change", function(t) {
                    var o = e(t.currentTarget).data("radius");
                    try {
                        localStorage.setItem("dore-radius", o), window.location.reload();
                    } catch (e) {}
                }),
                e("#switchDark").on("change", function(o) {
                    var a = e(o.currentTarget)[0].checked ? "dark" : "light";
                    "dark" == a ? (t = t.replace("light", "dark")) : "light" == a && (t = t.replace("dark",
                        "light"));
                    try {
                        localStorage.setItem("dore-theme-color", t), window.location.reload();
                    } catch (e) {}
                }),
                e(".theme-button").on("click", function(t) {
                    t.preventDefault(), e(this).parents(".theme-colors").toggleClass("shown");
                }),
                e(document).on("click", function(t) {
                    e(t.target).parents().hasClass("theme-colors") ||
                        e(t.target).parents().hasClass("theme-button") ||
                        e(t.target).hasClass("theme-button") ||
                        e(t.target).hasClass("theme-colors") ||
                        (e(".theme-colors").hasClass("shown") && e(".theme-colors").removeClass("shown"));
                });
        })(jQuery);
    </script>

    <script>
        $(function() {
            $('#survey-section').addClass('active');
        })
    </script>

    
    <script>
        $(function() {
            setTimeout(() => {
                $('#notification').fadeIn('slow')
            }, 1500);
        })
        $(function() {
            setTimeout(() => {
                $('#notification').fadeTo('slow', 0)
            }, 3000);
        })
    </script>

    <script>
        $(function() {
            $('.survey-filter').on('click', function() {
                $(this).parent().parent().children('.dropdown-toggle').text($(this).text())
                // $('.survey-list').children('a').each()

                switch ($(this).text()) {
                    case 'View All':
                        $('.survey-list').children('a').children('.archive').parent().show()
                        $('.survey-list').children('a').children('.deploy').parent().show()
                        $('.survey-list').children('a').children('.draft').parent().show()

                        break;
                    case 'Archived':
                        console.log('archived');
                        $('.survey-list').children('a').children('.archive').parent().show()
                        $('.survey-list').children('a').children('.deploy').parent().hide()
                        $('.survey-list').children('a').children('.draft').parent().hide()
                        break;
                    case 'Deployed':
                        console.log('deployed');
                        $('.survey-list').children('a').children('.archive').parent().hide()
                        $('.survey-list').children('a').children('.deploy').parent().show()
                        $('.survey-list').children('a').children('.draft').parent().hide()
                        break;
                    case 'Drafted':
                        console.log('drafted');
                        $('.survey-list').children('a').children('.archive').parent().hide()
                        $('.survey-list').children('a').children('.deploy').parent().hide()
                        $('.survey-list').children('a').children('.draft').parent().show()
                        break;

                }
            })
        })
    </script>

    
    
</body>
<!-- Mirrored from dore-jquery.coloredstrategies.com/Apps.Survey.List.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Nov 2021 22:42:02 GMT -->

</html>

<?php echo $__env->make('inc.dashboard.survey.survey-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\new-projects-dev\app\resources\views/dashboard/surveys/index.blade.php ENDPATH**/ ?>