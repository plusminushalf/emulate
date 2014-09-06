<?php
class FluidCache_project_emulate_Standard_layout_Page_14f429263136af39504a3008e7a5cc9eca506e4d extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// TODO
	return new \TYPO3\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {

return NULL;
}
public function hasLayout() {
return FALSE;
}

/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '<!DOCTYPE html>
<html>

    <head>

        <title>Emulate</title>

        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <meta name="description" content="Mint by Grozav is a flat design approach towards Admin Dashboards. Intuitive, cutting-edge, clean and easy to use and customize, as every Application UI should be. " />

        <!-- Core CSS - Include with every page -->
        <link href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments1 = array();
$arguments1['path'] = 'css/style.css';
$arguments1['package'] = NULL;
$arguments1['resource'] = NULL;
$arguments1['localize'] = true;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper3 = $self->getViewHelper('$viewHelper3', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper3->setArguments($arguments1);
$viewHelper3->setRenderingContext($renderingContext);
$viewHelper3->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper3->initializeArgumentsAndRender();

$output0 .= '" rel="stylesheet" type="text/css" />
        <link href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments4 = array();
$arguments4['path'] = 'css/bootstrap.css';
$arguments4['package'] = NULL;
$arguments4['resource'] = NULL;
$arguments4['localize'] = true;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper6 = $self->getViewHelper('$viewHelper6', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper6->setArguments($arguments4);
$viewHelper6->setRenderingContext($renderingContext);
$viewHelper6->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper6->initializeArgumentsAndRender();

$output0 .= '" rel="stylesheet" />
        <link href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments7 = array();
$arguments7['path'] = 'css/font-awesome-4.1.0/css/font-awesome.min.css';
$arguments7['package'] = NULL;
$arguments7['resource'] = NULL;
$arguments7['localize'] = true;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper9 = $self->getViewHelper('$viewHelper9', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper9->setArguments($arguments7);
$viewHelper9->setRenderingContext($renderingContext);
$viewHelper9->setRenderChildrenClosure($renderChildrenClosure8);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper9->initializeArgumentsAndRender();

$output0 .= '" rel="stylesheet" />
        <link href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments10 = array();
$arguments10['path'] = 'css/plugins/morris/morris-0.4.3.min.css';
$arguments10['package'] = NULL;
$arguments10['resource'] = NULL;
$arguments10['localize'] = true;
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper12 = $self->getViewHelper('$viewHelper12', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper12->setArguments($arguments10);
$viewHelper12->setRenderingContext($renderingContext);
$viewHelper12->setRenderChildrenClosure($renderChildrenClosure11);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper12->initializeArgumentsAndRender();

$output0 .= '" rel="stylesheet" />
        <link href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments13 = array();
$arguments13['path'] = 'css/plugins/timeline/timeline.css';
$arguments13['package'] = NULL;
$arguments13['resource'] = NULL;
$arguments13['localize'] = true;
$renderChildrenClosure14 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper15 = $self->getViewHelper('$viewHelper15', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper15->setArguments($arguments13);
$viewHelper15->setRenderingContext($renderingContext);
$viewHelper15->setRenderChildrenClosure($renderChildrenClosure14);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper15->initializeArgumentsAndRender();

$output0 .= '" rel="stylesheet" />
        <link href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments16 = array();
$arguments16['path'] = 'css/mint-admin.css';
$arguments16['package'] = NULL;
$arguments16['resource'] = NULL;
$arguments16['localize'] = true;
$renderChildrenClosure17 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper18 = $self->getViewHelper('$viewHelper18', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper18->setArguments($arguments16);
$viewHelper18->setRenderingContext($renderingContext);
$viewHelper18->setRenderChildrenClosure($renderChildrenClosure17);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper18->initializeArgumentsAndRender();

$output0 .= '" rel="stylesheet" />
        <link href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments19 = array();
$arguments19['path'] = 'css/plugins/social-buttons/social-buttons.css';
$arguments19['package'] = NULL;
$arguments19['resource'] = NULL;
$arguments19['localize'] = true;
$renderChildrenClosure20 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper21 = $self->getViewHelper('$viewHelper21', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper21->setArguments($arguments19);
$viewHelper21->setRenderingContext($renderingContext);
$viewHelper21->setRenderChildrenClosure($renderChildrenClosure20);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper21->initializeArgumentsAndRender();

$output0 .= '" rel="stylesheet" />
        <script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments22 = array();
$arguments22['path'] = 'js/jquery.min.js';
$arguments22['package'] = NULL;
$arguments22['resource'] = NULL;
$arguments22['localize'] = true;
$renderChildrenClosure23 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper24 = $self->getViewHelper('$viewHelper24', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper24->setArguments($arguments22);
$viewHelper24->setRenderingContext($renderingContext);
$viewHelper24->setRenderChildrenClosure($renderChildrenClosure23);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper24->initializeArgumentsAndRender();

$output0 .= '" type="text/javascript"></script>
        <script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments25 = array();
$arguments25['path'] = 'js/myscript.js';
$arguments25['package'] = NULL;
$arguments25['resource'] = NULL;
$arguments25['localize'] = true;
$renderChildrenClosure26 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper27 = $self->getViewHelper('$viewHelper27', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper27->setArguments($arguments25);
$viewHelper27->setRenderingContext($renderingContext);
$viewHelper27->setRenderChildrenClosure($renderChildrenClosure26);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper27->initializeArgumentsAndRender();

$output0 .= '" type="text/javascript"></script>
        <script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments28 = array();
$arguments28['path'] = 'js/jquery-1.10.2.js';
$arguments28['package'] = NULL;
$arguments28['resource'] = NULL;
$arguments28['localize'] = true;
$renderChildrenClosure29 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper30 = $self->getViewHelper('$viewHelper30', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper30->setArguments($arguments28);
$viewHelper30->setRenderingContext($renderingContext);
$viewHelper30->setRenderChildrenClosure($renderChildrenClosure29);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper30->initializeArgumentsAndRender();

$output0 .= '"></script>
        <script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments31 = array();
$arguments31['path'] = 'js/bootstrap.min.js';
$arguments31['package'] = NULL;
$arguments31['resource'] = NULL;
$arguments31['localize'] = true;
$renderChildrenClosure32 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper33 = $self->getViewHelper('$viewHelper33', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper33->setArguments($arguments31);
$viewHelper33->setRenderingContext($renderingContext);
$viewHelper33->setRenderChildrenClosure($renderChildrenClosure32);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper33->initializeArgumentsAndRender();

$output0 .= '"></script>
        <script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments34 = array();
$arguments34['path'] = 'js/plugins/metisMenu/jquery.metisMenu.js';
$arguments34['package'] = NULL;
$arguments34['resource'] = NULL;
$arguments34['localize'] = true;
$renderChildrenClosure35 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper36 = $self->getViewHelper('$viewHelper36', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper36->setArguments($arguments34);
$viewHelper36->setRenderingContext($renderingContext);
$viewHelper36->setRenderChildrenClosure($renderChildrenClosure35);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper36->initializeArgumentsAndRender();

$output0 .= '"></script>
        <script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments37 = array();
$arguments37['path'] = 'js/plugins/morris/raphael-2.1.0.min.js';
$arguments37['package'] = NULL;
$arguments37['resource'] = NULL;
$arguments37['localize'] = true;
$renderChildrenClosure38 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper39 = $self->getViewHelper('$viewHelper39', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper39->setArguments($arguments37);
$viewHelper39->setRenderingContext($renderingContext);
$viewHelper39->setRenderChildrenClosure($renderChildrenClosure38);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper39->initializeArgumentsAndRender();

$output0 .= '"></script>
        <script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments40 = array();
$arguments40['path'] = 'js/plugins/morris/morris.js';
$arguments40['package'] = NULL;
$arguments40['resource'] = NULL;
$arguments40['localize'] = true;
$renderChildrenClosure41 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper42 = $self->getViewHelper('$viewHelper42', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper42->setArguments($arguments40);
$viewHelper42->setRenderingContext($renderingContext);
$viewHelper42->setRenderChildrenClosure($renderChildrenClosure41);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper42->initializeArgumentsAndRender();

$output0 .= '"></script>
        <script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments43 = array();
$arguments43['path'] = 'js/mint-admin.js';
$arguments43['package'] = NULL;
$arguments43['resource'] = NULL;
$arguments43['localize'] = true;
$renderChildrenClosure44 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper45 = $self->getViewHelper('$viewHelper45', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper45->setArguments($arguments43);
$viewHelper45->setRenderingContext($renderingContext);
$viewHelper45->setRenderChildrenClosure($renderChildrenClosure44);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper45->initializeArgumentsAndRender();

$output0 .= '"></script>
        <script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments46 = array();
$arguments46['path'] = 'js/demo/dashboard-demo.js';
$arguments46['package'] = NULL;
$arguments46['resource'] = NULL;
$arguments46['localize'] = true;
$renderChildrenClosure47 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper48 = $self->getViewHelper('$viewHelper48', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper48->setArguments($arguments46);
$viewHelper48->setRenderingContext($renderingContext);
$viewHelper48->setRenderChildrenClosure($renderChildrenClosure47);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper48->initializeArgumentsAndRender();

$output0 .= '"></script>
        <script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments49 = array();
$arguments49['path'] = 'js/animate.js';
$arguments49['package'] = NULL;
$arguments49['resource'] = NULL;
$arguments49['localize'] = true;
$renderChildrenClosure50 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper51 = $self->getViewHelper('$viewHelper51', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper51->setArguments($arguments49);
$viewHelper51->setRenderingContext($renderingContext);
$viewHelper51->setRenderChildrenClosure($renderChildrenClosure50);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper51->initializeArgumentsAndRender();

$output0 .= '" type="text/javascript"></script>
        <script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments52 = array();
$arguments52['path'] = 'js/ajax.js';
$arguments52['package'] = NULL;
$arguments52['resource'] = NULL;
$arguments52['localize'] = true;
$renderChildrenClosure53 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper54 = $self->getViewHelper('$viewHelper54', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper54->setArguments($arguments52);
$viewHelper54->setRenderingContext($renderingContext);
$viewHelper54->setRenderChildrenClosure($renderChildrenClosure53);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper54->initializeArgumentsAndRender();

$output0 .= '" type="text/javascript"></script>
	<script>
		var InfiniteAjaxRequest = function (uri) {
    			$.ajax({
        			url: uri,
        			success: function(data) {
            				// do something with "data"
            				if (data.length > 0) {
            					if(data===\'false\') {
            						window.open("{siteurl}login/extend","","width=500, height=400");
                                    window.setTimeout(function() {
                                        InfiniteAjaxRequest (uri);
                                    },5500);
                				}
                                else if(data===\'logout\'){
                                    window.location.assign("{siteurl}")
                                }
                                else {
                                    InfiniteAjaxRequest (uri);
                                }
            				}
        			},
        			error: function(xhr, ajaxOptions, thrownError) {
            				InfiniteAjaxRequest (uri);
        			}
    			});
		};
	</script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>

    <body>


	        <div id="wrapper">

		    <!-- navbar-static-top -->
        	    <nav class="navbar navbar-default navbar-static-top" role="navigation">
                    <!-- navbar-header -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments55 = array();
$arguments55['class'] = 'navbar-brand';
$arguments55['action'] = 'index';
$arguments55['controller'] = 'Standard';
$arguments55['additionalAttributes'] = NULL;
$arguments55['data'] = NULL;
$arguments55['arguments'] = array (
);
$arguments55['package'] = NULL;
$arguments55['subpackage'] = NULL;
$arguments55['section'] = '';
$arguments55['format'] = '';
$arguments55['additionalParams'] = array (
);
$arguments55['addQueryString'] = false;
$arguments55['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments55['useParentRequest'] = false;
$arguments55['absolute'] = true;
$arguments55['dir'] = NULL;
$arguments55['id'] = NULL;
$arguments55['lang'] = NULL;
$arguments55['style'] = NULL;
$arguments55['title'] = NULL;
$arguments55['accesskey'] = NULL;
$arguments55['tabindex'] = NULL;
$arguments55['onclick'] = NULL;
$arguments55['name'] = NULL;
$arguments55['rel'] = NULL;
$arguments55['rev'] = NULL;
$arguments55['target'] = NULL;
$renderChildrenClosure56 = function() use ($renderingContext, $self) {
return 'Emulate';
};
$viewHelper57 = $self->getViewHelper('$viewHelper57', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper57->setArguments($arguments55);
$viewHelper57->setRenderingContext($renderingContext);
$viewHelper57->setRenderChildrenClosure($renderChildrenClosure56);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper57->initializeArgumentsAndRender();

$output0 .= '
                    </div>
                    <!-- /.navbar-header -->
                    <!-- navbar-top-links -->
                    <ul class="nav navbar-top-links navbar-right">
                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                 <i class="fa fa-bell fa-2x fa-fw"></i><span class="notification-icon label label-danger">1</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments58 = array();
$arguments58['section'] = 'notifications';
$arguments58['partial'] = NULL;
$arguments58['arguments'] = array (
);
$arguments58['optional'] = false;
$renderChildrenClosure59 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper60 = $self->getViewHelper('$viewHelper60', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper60->setArguments($arguments58);
$viewHelper60->setRenderingContext($renderingContext);
$viewHelper60->setRenderChildrenClosure($renderChildrenClosure59);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output0 .= $viewHelper60->initializeArgumentsAndRender();

$output0 .= '
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- /.dropdown-alerts -->
                        </li>
                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-2x fa-fw"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments61 = array();
$arguments61['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'my-account-link', $renderingContext);
$arguments61['keepQuotes'] = false;
$arguments61['encoding'] = 'UTF-8';
$arguments61['doubleEncode'] = true;
$renderChildrenClosure62 = function() use ($renderingContext, $self) {
return NULL;
};
$value63 = ($arguments61['value'] !== NULL ? $arguments61['value'] : $renderChildrenClosure62());

$output0 .= (!is_string($value63) ? $value63 : htmlspecialchars($value63, ($arguments61['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments61['encoding'], $arguments61['doubleEncode']));

$output0 .= '"><i class="fa fa-user fa-fw"></i> User Profile</a>
                                </li>
                                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                                </li>
                                <li class="divider"></li>
                                <li>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments64 = array();
$arguments64['action'] = 'logout';
$arguments64['controller'] = 'Standard';
$arguments64['additionalAttributes'] = NULL;
$arguments64['data'] = NULL;
$arguments64['arguments'] = array (
);
$arguments64['package'] = NULL;
$arguments64['subpackage'] = NULL;
$arguments64['section'] = '';
$arguments64['format'] = '';
$arguments64['additionalParams'] = array (
);
$arguments64['addQueryString'] = false;
$arguments64['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments64['useParentRequest'] = false;
$arguments64['absolute'] = true;
$arguments64['class'] = NULL;
$arguments64['dir'] = NULL;
$arguments64['id'] = NULL;
$arguments64['lang'] = NULL;
$arguments64['style'] = NULL;
$arguments64['title'] = NULL;
$arguments64['accesskey'] = NULL;
$arguments64['tabindex'] = NULL;
$arguments64['onclick'] = NULL;
$arguments64['name'] = NULL;
$arguments64['rel'] = NULL;
$arguments64['rev'] = NULL;
$arguments64['target'] = NULL;
$renderChildrenClosure65 = function() use ($renderingContext, $self) {
return '<i class="fa fa-sign-out fa-fw"></i> Logout';
};
$viewHelper66 = $self->getViewHelper('$viewHelper66', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper66->setArguments($arguments64);
$viewHelper66->setRenderingContext($renderingContext);
$viewHelper66->setRenderChildrenClosure($renderChildrenClosure65);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper66->initializeArgumentsAndRender();

$output0 .= '
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                    <!-- /.navbar-top-links -->
        	    </nav>
        	    <!-- /.navbar-static-top -->

		    <!-- /.navbar-static-side -->
        	    <nav class="navbar-default navbar-static-side" role="navigation">
        	        <div class="sidebar-collapse">
        	            <ul class="nav" id="side-menu">
        	                <li>
        	                    <div class="user-info-wrapper">
        	                        <div class="user-info-profile-image">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments67 = array();
// Rendering Boolean node
$arguments67['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user.userAccount.gender', $renderingContext), 'Male');
$arguments67['then'] = NULL;
$arguments67['else'] = NULL;
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
$output69 = '';

$output69 .= '
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments70 = array();
$renderChildrenClosure71 = function() use ($renderingContext, $self) {
$output72 = '';

$output72 .= '
                                                <img src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments73 = array();
$arguments73['path'] = 'img/Generic_profile_M.jpg';
$arguments73['package'] = NULL;
$arguments73['resource'] = NULL;
$arguments73['localize'] = true;
$renderChildrenClosure74 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper75 = $self->getViewHelper('$viewHelper75', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper75->setArguments($arguments73);
$viewHelper75->setRenderingContext($renderingContext);
$viewHelper75->setRenderChildrenClosure($renderChildrenClosure74);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output72 .= $viewHelper75->initializeArgumentsAndRender();

$output72 .= '" alt="" width="65" height="65" />
                                            ';
return $output72;
};
$viewHelper76 = $self->getViewHelper('$viewHelper76', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper76->setArguments($arguments70);
$viewHelper76->setRenderingContext($renderingContext);
$viewHelper76->setRenderChildrenClosure($renderChildrenClosure71);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output69 .= $viewHelper76->initializeArgumentsAndRender();

$output69 .= '
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments77 = array();
$renderChildrenClosure78 = function() use ($renderingContext, $self) {
$output79 = '';

$output79 .= '
                                                <img src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments80 = array();
$arguments80['path'] = 'img/Generic_profile_F.jpg';
$arguments80['package'] = NULL;
$arguments80['resource'] = NULL;
$arguments80['localize'] = true;
$renderChildrenClosure81 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper82 = $self->getViewHelper('$viewHelper82', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper82->setArguments($arguments80);
$viewHelper82->setRenderingContext($renderingContext);
$viewHelper82->setRenderChildrenClosure($renderChildrenClosure81);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output79 .= $viewHelper82->initializeArgumentsAndRender();

$output79 .= '" alt="" width="65" height="65" />
                                            ';
return $output79;
};
$viewHelper83 = $self->getViewHelper('$viewHelper83', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper83->setArguments($arguments77);
$viewHelper83->setRenderingContext($renderingContext);
$viewHelper83->setRenderChildrenClosure($renderChildrenClosure78);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output69 .= $viewHelper83->initializeArgumentsAndRender();

$output69 .= '
                                        ';
return $output69;
};
$arguments67['__thenClosure'] = function() use ($renderingContext, $self) {
$output84 = '';

$output84 .= '
                                                <img src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments85 = array();
$arguments85['path'] = 'img/Generic_profile_M.jpg';
$arguments85['package'] = NULL;
$arguments85['resource'] = NULL;
$arguments85['localize'] = true;
$renderChildrenClosure86 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper87 = $self->getViewHelper('$viewHelper87', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper87->setArguments($arguments85);
$viewHelper87->setRenderingContext($renderingContext);
$viewHelper87->setRenderChildrenClosure($renderChildrenClosure86);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output84 .= $viewHelper87->initializeArgumentsAndRender();

$output84 .= '" alt="" width="65" height="65" />
                                            ';
return $output84;
};
$arguments67['__elseClosure'] = function() use ($renderingContext, $self) {
$output88 = '';

$output88 .= '
                                                <img src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments89 = array();
$arguments89['path'] = 'img/Generic_profile_F.jpg';
$arguments89['package'] = NULL;
$arguments89['resource'] = NULL;
$arguments89['localize'] = true;
$renderChildrenClosure90 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper91 = $self->getViewHelper('$viewHelper91', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper91->setArguments($arguments89);
$viewHelper91->setRenderingContext($renderingContext);
$viewHelper91->setRenderChildrenClosure($renderChildrenClosure90);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output88 .= $viewHelper91->initializeArgumentsAndRender();

$output88 .= '" alt="" width="65" height="65" />
                                            ';
return $output88;
};
$viewHelper92 = $self->getViewHelper('$viewHelper92', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper92->setArguments($arguments67);
$viewHelper92->setRenderingContext($renderingContext);
$viewHelper92->setRenderChildrenClosure($renderChildrenClosure68);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper92->initializeArgumentsAndRender();

$output0 .= '
        	                        </div>
        	                        <div class="user-info">
        	                            <div class="user-welcome">Welcome</div>
        	                            <div class="username"><strong>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments93 = array();
$arguments93['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user.userAccount.Name', $renderingContext);
$arguments93['keepQuotes'] = false;
$arguments93['encoding'] = 'UTF-8';
$arguments93['doubleEncode'] = true;
$renderChildrenClosure94 = function() use ($renderingContext, $self) {
return NULL;
};
$value95 = ($arguments93['value'] !== NULL ? $arguments93['value'] : $renderChildrenClosure94());

$output0 .= (!is_string($value95) ? $value95 : htmlspecialchars($value95, ($arguments93['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments93['encoding'], $arguments93['doubleEncode']));

$output0 .= '</strong></div>
        	                        </div>
        	                    </div>
        	                </li>
        	                <li class="sidebar-search">
        	                    <div class="input-group custom-search-form">
        	                        <input type="text" class="form-control" placeholder="Search Faq ..." />
        	                        <span class="input-group-btn">
        	                            <button class="btn btn-default" type="button">
        	                                <i class="fa fa-search"></i>
        	                            </button>
        	                        </span>
        	                    </div>
        	                    <!-- /input-group -->
        	                </li>
        	                <li>
                                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments96 = array();
// Rendering Boolean node
$arguments96['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'active', $renderingContext), 'home');
$arguments96['then'] = NULL;
$arguments96['else'] = NULL;
$renderChildrenClosure97 = function() use ($renderingContext, $self) {
$output98 = '';

$output98 .= '
                                    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments99 = array();
$renderChildrenClosure100 = function() use ($renderingContext, $self) {
$output101 = '';

$output101 .= '
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments102 = array();
$arguments102['action'] = 'home';
$arguments102['class'] = 'active';
$arguments102['additionalAttributes'] = NULL;
$arguments102['data'] = NULL;
$arguments102['arguments'] = array (
);
$arguments102['controller'] = NULL;
$arguments102['package'] = NULL;
$arguments102['subpackage'] = NULL;
$arguments102['section'] = '';
$arguments102['format'] = '';
$arguments102['additionalParams'] = array (
);
$arguments102['addQueryString'] = false;
$arguments102['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments102['useParentRequest'] = false;
$arguments102['absolute'] = true;
$arguments102['dir'] = NULL;
$arguments102['id'] = NULL;
$arguments102['lang'] = NULL;
$arguments102['style'] = NULL;
$arguments102['title'] = NULL;
$arguments102['accesskey'] = NULL;
$arguments102['tabindex'] = NULL;
$arguments102['onclick'] = NULL;
$arguments102['name'] = NULL;
$arguments102['rel'] = NULL;
$arguments102['rev'] = NULL;
$arguments102['target'] = NULL;
$renderChildrenClosure103 = function() use ($renderingContext, $self) {
return '<i class="fa fa-home fa-fw fa-3x"></i>Home';
};
$viewHelper104 = $self->getViewHelper('$viewHelper104', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper104->setArguments($arguments102);
$viewHelper104->setRenderingContext($renderingContext);
$viewHelper104->setRenderChildrenClosure($renderChildrenClosure103);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output101 .= $viewHelper104->initializeArgumentsAndRender();

$output101 .= '
                                    ';
return $output101;
};
$viewHelper105 = $self->getViewHelper('$viewHelper105', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper105->setArguments($arguments99);
$viewHelper105->setRenderingContext($renderingContext);
$viewHelper105->setRenderChildrenClosure($renderChildrenClosure100);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output98 .= $viewHelper105->initializeArgumentsAndRender();

$output98 .= '
                                    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments106 = array();
$renderChildrenClosure107 = function() use ($renderingContext, $self) {
$output108 = '';

$output108 .= '
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments109 = array();
$arguments109['action'] = 'home';
$arguments109['additionalAttributes'] = NULL;
$arguments109['data'] = NULL;
$arguments109['arguments'] = array (
);
$arguments109['controller'] = NULL;
$arguments109['package'] = NULL;
$arguments109['subpackage'] = NULL;
$arguments109['section'] = '';
$arguments109['format'] = '';
$arguments109['additionalParams'] = array (
);
$arguments109['addQueryString'] = false;
$arguments109['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments109['useParentRequest'] = false;
$arguments109['absolute'] = true;
$arguments109['class'] = NULL;
$arguments109['dir'] = NULL;
$arguments109['id'] = NULL;
$arguments109['lang'] = NULL;
$arguments109['style'] = NULL;
$arguments109['title'] = NULL;
$arguments109['accesskey'] = NULL;
$arguments109['tabindex'] = NULL;
$arguments109['onclick'] = NULL;
$arguments109['name'] = NULL;
$arguments109['rel'] = NULL;
$arguments109['rev'] = NULL;
$arguments109['target'] = NULL;
$renderChildrenClosure110 = function() use ($renderingContext, $self) {
return '<i class="fa fa-home fa-fw fa-3x"></i>Home';
};
$viewHelper111 = $self->getViewHelper('$viewHelper111', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper111->setArguments($arguments109);
$viewHelper111->setRenderingContext($renderingContext);
$viewHelper111->setRenderChildrenClosure($renderChildrenClosure110);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output108 .= $viewHelper111->initializeArgumentsAndRender();

$output108 .= '
                                    ';
return $output108;
};
$viewHelper112 = $self->getViewHelper('$viewHelper112', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper112->setArguments($arguments106);
$viewHelper112->setRenderingContext($renderingContext);
$viewHelper112->setRenderChildrenClosure($renderChildrenClosure107);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output98 .= $viewHelper112->initializeArgumentsAndRender();

$output98 .= '
                                ';
return $output98;
};
$arguments96['__thenClosure'] = function() use ($renderingContext, $self) {
$output113 = '';

$output113 .= '
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments114 = array();
$arguments114['action'] = 'home';
$arguments114['class'] = 'active';
$arguments114['additionalAttributes'] = NULL;
$arguments114['data'] = NULL;
$arguments114['arguments'] = array (
);
$arguments114['controller'] = NULL;
$arguments114['package'] = NULL;
$arguments114['subpackage'] = NULL;
$arguments114['section'] = '';
$arguments114['format'] = '';
$arguments114['additionalParams'] = array (
);
$arguments114['addQueryString'] = false;
$arguments114['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments114['useParentRequest'] = false;
$arguments114['absolute'] = true;
$arguments114['dir'] = NULL;
$arguments114['id'] = NULL;
$arguments114['lang'] = NULL;
$arguments114['style'] = NULL;
$arguments114['title'] = NULL;
$arguments114['accesskey'] = NULL;
$arguments114['tabindex'] = NULL;
$arguments114['onclick'] = NULL;
$arguments114['name'] = NULL;
$arguments114['rel'] = NULL;
$arguments114['rev'] = NULL;
$arguments114['target'] = NULL;
$renderChildrenClosure115 = function() use ($renderingContext, $self) {
return '<i class="fa fa-home fa-fw fa-3x"></i>Home';
};
$viewHelper116 = $self->getViewHelper('$viewHelper116', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper116->setArguments($arguments114);
$viewHelper116->setRenderingContext($renderingContext);
$viewHelper116->setRenderChildrenClosure($renderChildrenClosure115);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output113 .= $viewHelper116->initializeArgumentsAndRender();

$output113 .= '
                                    ';
return $output113;
};
$arguments96['__elseClosure'] = function() use ($renderingContext, $self) {
$output117 = '';

$output117 .= '
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments118 = array();
$arguments118['action'] = 'home';
$arguments118['additionalAttributes'] = NULL;
$arguments118['data'] = NULL;
$arguments118['arguments'] = array (
);
$arguments118['controller'] = NULL;
$arguments118['package'] = NULL;
$arguments118['subpackage'] = NULL;
$arguments118['section'] = '';
$arguments118['format'] = '';
$arguments118['additionalParams'] = array (
);
$arguments118['addQueryString'] = false;
$arguments118['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments118['useParentRequest'] = false;
$arguments118['absolute'] = true;
$arguments118['class'] = NULL;
$arguments118['dir'] = NULL;
$arguments118['id'] = NULL;
$arguments118['lang'] = NULL;
$arguments118['style'] = NULL;
$arguments118['title'] = NULL;
$arguments118['accesskey'] = NULL;
$arguments118['tabindex'] = NULL;
$arguments118['onclick'] = NULL;
$arguments118['name'] = NULL;
$arguments118['rel'] = NULL;
$arguments118['rev'] = NULL;
$arguments118['target'] = NULL;
$renderChildrenClosure119 = function() use ($renderingContext, $self) {
return '<i class="fa fa-home fa-fw fa-3x"></i>Home';
};
$viewHelper120 = $self->getViewHelper('$viewHelper120', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper120->setArguments($arguments118);
$viewHelper120->setRenderingContext($renderingContext);
$viewHelper120->setRenderChildrenClosure($renderChildrenClosure119);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output117 .= $viewHelper120->initializeArgumentsAndRender();

$output117 .= '
                                    ';
return $output117;
};
$viewHelper121 = $self->getViewHelper('$viewHelper121', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper121->setArguments($arguments96);
$viewHelper121->setRenderingContext($renderingContext);
$viewHelper121->setRenderChildrenClosure($renderChildrenClosure97);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper121->initializeArgumentsAndRender();

$output0 .= '
                                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments122 = array();
// Rendering Boolean node
$arguments122['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'active', $renderingContext), 'emulator');
$arguments122['then'] = NULL;
$arguments122['else'] = NULL;
$renderChildrenClosure123 = function() use ($renderingContext, $self) {
$output124 = '';

$output124 .= '
                                    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments125 = array();
$renderChildrenClosure126 = function() use ($renderingContext, $self) {
$output127 = '';

$output127 .= '
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments128 = array();
$arguments128['action'] = 'emulator';
$arguments128['class'] = 'active';
$arguments128['additionalAttributes'] = NULL;
$arguments128['data'] = NULL;
$arguments128['arguments'] = array (
);
$arguments128['controller'] = NULL;
$arguments128['package'] = NULL;
$arguments128['subpackage'] = NULL;
$arguments128['section'] = '';
$arguments128['format'] = '';
$arguments128['additionalParams'] = array (
);
$arguments128['addQueryString'] = false;
$arguments128['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments128['useParentRequest'] = false;
$arguments128['absolute'] = true;
$arguments128['dir'] = NULL;
$arguments128['id'] = NULL;
$arguments128['lang'] = NULL;
$arguments128['style'] = NULL;
$arguments128['title'] = NULL;
$arguments128['accesskey'] = NULL;
$arguments128['tabindex'] = NULL;
$arguments128['onclick'] = NULL;
$arguments128['name'] = NULL;
$arguments128['rel'] = NULL;
$arguments128['rev'] = NULL;
$arguments128['target'] = NULL;
$renderChildrenClosure129 = function() use ($renderingContext, $self) {
return '<i class="fa fa-github-alt fa-fw fa-3x"></i>Emulator';
};
$viewHelper130 = $self->getViewHelper('$viewHelper130', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper130->setArguments($arguments128);
$viewHelper130->setRenderingContext($renderingContext);
$viewHelper130->setRenderChildrenClosure($renderChildrenClosure129);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output127 .= $viewHelper130->initializeArgumentsAndRender();

$output127 .= '
                                    ';
return $output127;
};
$viewHelper131 = $self->getViewHelper('$viewHelper131', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper131->setArguments($arguments125);
$viewHelper131->setRenderingContext($renderingContext);
$viewHelper131->setRenderChildrenClosure($renderChildrenClosure126);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output124 .= $viewHelper131->initializeArgumentsAndRender();

$output124 .= '
                                    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments132 = array();
$renderChildrenClosure133 = function() use ($renderingContext, $self) {
$output134 = '';

$output134 .= '
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments135 = array();
$arguments135['action'] = 'emulator';
$arguments135['additionalAttributes'] = NULL;
$arguments135['data'] = NULL;
$arguments135['arguments'] = array (
);
$arguments135['controller'] = NULL;
$arguments135['package'] = NULL;
$arguments135['subpackage'] = NULL;
$arguments135['section'] = '';
$arguments135['format'] = '';
$arguments135['additionalParams'] = array (
);
$arguments135['addQueryString'] = false;
$arguments135['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments135['useParentRequest'] = false;
$arguments135['absolute'] = true;
$arguments135['class'] = NULL;
$arguments135['dir'] = NULL;
$arguments135['id'] = NULL;
$arguments135['lang'] = NULL;
$arguments135['style'] = NULL;
$arguments135['title'] = NULL;
$arguments135['accesskey'] = NULL;
$arguments135['tabindex'] = NULL;
$arguments135['onclick'] = NULL;
$arguments135['name'] = NULL;
$arguments135['rel'] = NULL;
$arguments135['rev'] = NULL;
$arguments135['target'] = NULL;
$renderChildrenClosure136 = function() use ($renderingContext, $self) {
return '<i class="fa fa-github-alt fa-fw fa-3x"></i>Emulator';
};
$viewHelper137 = $self->getViewHelper('$viewHelper137', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper137->setArguments($arguments135);
$viewHelper137->setRenderingContext($renderingContext);
$viewHelper137->setRenderChildrenClosure($renderChildrenClosure136);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output134 .= $viewHelper137->initializeArgumentsAndRender();

$output134 .= '
                                    ';
return $output134;
};
$viewHelper138 = $self->getViewHelper('$viewHelper138', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper138->setArguments($arguments132);
$viewHelper138->setRenderingContext($renderingContext);
$viewHelper138->setRenderChildrenClosure($renderChildrenClosure133);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output124 .= $viewHelper138->initializeArgumentsAndRender();

$output124 .= '
                                ';
return $output124;
};
$arguments122['__thenClosure'] = function() use ($renderingContext, $self) {
$output139 = '';

$output139 .= '
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments140 = array();
$arguments140['action'] = 'emulator';
$arguments140['class'] = 'active';
$arguments140['additionalAttributes'] = NULL;
$arguments140['data'] = NULL;
$arguments140['arguments'] = array (
);
$arguments140['controller'] = NULL;
$arguments140['package'] = NULL;
$arguments140['subpackage'] = NULL;
$arguments140['section'] = '';
$arguments140['format'] = '';
$arguments140['additionalParams'] = array (
);
$arguments140['addQueryString'] = false;
$arguments140['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments140['useParentRequest'] = false;
$arguments140['absolute'] = true;
$arguments140['dir'] = NULL;
$arguments140['id'] = NULL;
$arguments140['lang'] = NULL;
$arguments140['style'] = NULL;
$arguments140['title'] = NULL;
$arguments140['accesskey'] = NULL;
$arguments140['tabindex'] = NULL;
$arguments140['onclick'] = NULL;
$arguments140['name'] = NULL;
$arguments140['rel'] = NULL;
$arguments140['rev'] = NULL;
$arguments140['target'] = NULL;
$renderChildrenClosure141 = function() use ($renderingContext, $self) {
return '<i class="fa fa-github-alt fa-fw fa-3x"></i>Emulator';
};
$viewHelper142 = $self->getViewHelper('$viewHelper142', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper142->setArguments($arguments140);
$viewHelper142->setRenderingContext($renderingContext);
$viewHelper142->setRenderChildrenClosure($renderChildrenClosure141);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output139 .= $viewHelper142->initializeArgumentsAndRender();

$output139 .= '
                                    ';
return $output139;
};
$arguments122['__elseClosure'] = function() use ($renderingContext, $self) {
$output143 = '';

$output143 .= '
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments144 = array();
$arguments144['action'] = 'emulator';
$arguments144['additionalAttributes'] = NULL;
$arguments144['data'] = NULL;
$arguments144['arguments'] = array (
);
$arguments144['controller'] = NULL;
$arguments144['package'] = NULL;
$arguments144['subpackage'] = NULL;
$arguments144['section'] = '';
$arguments144['format'] = '';
$arguments144['additionalParams'] = array (
);
$arguments144['addQueryString'] = false;
$arguments144['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments144['useParentRequest'] = false;
$arguments144['absolute'] = true;
$arguments144['class'] = NULL;
$arguments144['dir'] = NULL;
$arguments144['id'] = NULL;
$arguments144['lang'] = NULL;
$arguments144['style'] = NULL;
$arguments144['title'] = NULL;
$arguments144['accesskey'] = NULL;
$arguments144['tabindex'] = NULL;
$arguments144['onclick'] = NULL;
$arguments144['name'] = NULL;
$arguments144['rel'] = NULL;
$arguments144['rev'] = NULL;
$arguments144['target'] = NULL;
$renderChildrenClosure145 = function() use ($renderingContext, $self) {
return '<i class="fa fa-github-alt fa-fw fa-3x"></i>Emulator';
};
$viewHelper146 = $self->getViewHelper('$viewHelper146', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper146->setArguments($arguments144);
$viewHelper146->setRenderingContext($renderingContext);
$viewHelper146->setRenderChildrenClosure($renderChildrenClosure145);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output143 .= $viewHelper146->initializeArgumentsAndRender();

$output143 .= '
                                    ';
return $output143;
};
$viewHelper147 = $self->getViewHelper('$viewHelper147', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper147->setArguments($arguments122);
$viewHelper147->setRenderingContext($renderingContext);
$viewHelper147->setRenderChildrenClosure($renderChildrenClosure123);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper147->initializeArgumentsAndRender();

$output0 .= '
                                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments148 = array();
// Rendering Boolean node
$arguments148['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'active', $renderingContext), 'help');
$arguments148['then'] = NULL;
$arguments148['else'] = NULL;
$renderChildrenClosure149 = function() use ($renderingContext, $self) {
$output150 = '';

$output150 .= '
                                    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments151 = array();
$renderChildrenClosure152 = function() use ($renderingContext, $self) {
$output153 = '';

$output153 .= '
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments154 = array();
$arguments154['action'] = 'help';
$arguments154['class'] = 'active';
$arguments154['additionalAttributes'] = NULL;
$arguments154['data'] = NULL;
$arguments154['arguments'] = array (
);
$arguments154['controller'] = NULL;
$arguments154['package'] = NULL;
$arguments154['subpackage'] = NULL;
$arguments154['section'] = '';
$arguments154['format'] = '';
$arguments154['additionalParams'] = array (
);
$arguments154['addQueryString'] = false;
$arguments154['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments154['useParentRequest'] = false;
$arguments154['absolute'] = true;
$arguments154['dir'] = NULL;
$arguments154['id'] = NULL;
$arguments154['lang'] = NULL;
$arguments154['style'] = NULL;
$arguments154['title'] = NULL;
$arguments154['accesskey'] = NULL;
$arguments154['tabindex'] = NULL;
$arguments154['onclick'] = NULL;
$arguments154['name'] = NULL;
$arguments154['rel'] = NULL;
$arguments154['rev'] = NULL;
$arguments154['target'] = NULL;
$renderChildrenClosure155 = function() use ($renderingContext, $self) {
return '<i class="fa fa-plus-square fa-fw fa-3x"></i>Help';
};
$viewHelper156 = $self->getViewHelper('$viewHelper156', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper156->setArguments($arguments154);
$viewHelper156->setRenderingContext($renderingContext);
$viewHelper156->setRenderChildrenClosure($renderChildrenClosure155);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output153 .= $viewHelper156->initializeArgumentsAndRender();

$output153 .= '
                                    ';
return $output153;
};
$viewHelper157 = $self->getViewHelper('$viewHelper157', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper157->setArguments($arguments151);
$viewHelper157->setRenderingContext($renderingContext);
$viewHelper157->setRenderChildrenClosure($renderChildrenClosure152);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output150 .= $viewHelper157->initializeArgumentsAndRender();

$output150 .= '
                                    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments158 = array();
$renderChildrenClosure159 = function() use ($renderingContext, $self) {
$output160 = '';

$output160 .= '
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments161 = array();
$arguments161['action'] = 'help';
$arguments161['additionalAttributes'] = NULL;
$arguments161['data'] = NULL;
$arguments161['arguments'] = array (
);
$arguments161['controller'] = NULL;
$arguments161['package'] = NULL;
$arguments161['subpackage'] = NULL;
$arguments161['section'] = '';
$arguments161['format'] = '';
$arguments161['additionalParams'] = array (
);
$arguments161['addQueryString'] = false;
$arguments161['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments161['useParentRequest'] = false;
$arguments161['absolute'] = true;
$arguments161['class'] = NULL;
$arguments161['dir'] = NULL;
$arguments161['id'] = NULL;
$arguments161['lang'] = NULL;
$arguments161['style'] = NULL;
$arguments161['title'] = NULL;
$arguments161['accesskey'] = NULL;
$arguments161['tabindex'] = NULL;
$arguments161['onclick'] = NULL;
$arguments161['name'] = NULL;
$arguments161['rel'] = NULL;
$arguments161['rev'] = NULL;
$arguments161['target'] = NULL;
$renderChildrenClosure162 = function() use ($renderingContext, $self) {
return '<i class="fa fa-plus-square fa-fw fa-3x"></i>Help';
};
$viewHelper163 = $self->getViewHelper('$viewHelper163', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper163->setArguments($arguments161);
$viewHelper163->setRenderingContext($renderingContext);
$viewHelper163->setRenderChildrenClosure($renderChildrenClosure162);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output160 .= $viewHelper163->initializeArgumentsAndRender();

$output160 .= '
                                    ';
return $output160;
};
$viewHelper164 = $self->getViewHelper('$viewHelper164', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper164->setArguments($arguments158);
$viewHelper164->setRenderingContext($renderingContext);
$viewHelper164->setRenderChildrenClosure($renderChildrenClosure159);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output150 .= $viewHelper164->initializeArgumentsAndRender();

$output150 .= '
                                ';
return $output150;
};
$arguments148['__thenClosure'] = function() use ($renderingContext, $self) {
$output165 = '';

$output165 .= '
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments166 = array();
$arguments166['action'] = 'help';
$arguments166['class'] = 'active';
$arguments166['additionalAttributes'] = NULL;
$arguments166['data'] = NULL;
$arguments166['arguments'] = array (
);
$arguments166['controller'] = NULL;
$arguments166['package'] = NULL;
$arguments166['subpackage'] = NULL;
$arguments166['section'] = '';
$arguments166['format'] = '';
$arguments166['additionalParams'] = array (
);
$arguments166['addQueryString'] = false;
$arguments166['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments166['useParentRequest'] = false;
$arguments166['absolute'] = true;
$arguments166['dir'] = NULL;
$arguments166['id'] = NULL;
$arguments166['lang'] = NULL;
$arguments166['style'] = NULL;
$arguments166['title'] = NULL;
$arguments166['accesskey'] = NULL;
$arguments166['tabindex'] = NULL;
$arguments166['onclick'] = NULL;
$arguments166['name'] = NULL;
$arguments166['rel'] = NULL;
$arguments166['rev'] = NULL;
$arguments166['target'] = NULL;
$renderChildrenClosure167 = function() use ($renderingContext, $self) {
return '<i class="fa fa-plus-square fa-fw fa-3x"></i>Help';
};
$viewHelper168 = $self->getViewHelper('$viewHelper168', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper168->setArguments($arguments166);
$viewHelper168->setRenderingContext($renderingContext);
$viewHelper168->setRenderChildrenClosure($renderChildrenClosure167);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output165 .= $viewHelper168->initializeArgumentsAndRender();

$output165 .= '
                                    ';
return $output165;
};
$arguments148['__elseClosure'] = function() use ($renderingContext, $self) {
$output169 = '';

$output169 .= '
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments170 = array();
$arguments170['action'] = 'help';
$arguments170['additionalAttributes'] = NULL;
$arguments170['data'] = NULL;
$arguments170['arguments'] = array (
);
$arguments170['controller'] = NULL;
$arguments170['package'] = NULL;
$arguments170['subpackage'] = NULL;
$arguments170['section'] = '';
$arguments170['format'] = '';
$arguments170['additionalParams'] = array (
);
$arguments170['addQueryString'] = false;
$arguments170['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments170['useParentRequest'] = false;
$arguments170['absolute'] = true;
$arguments170['class'] = NULL;
$arguments170['dir'] = NULL;
$arguments170['id'] = NULL;
$arguments170['lang'] = NULL;
$arguments170['style'] = NULL;
$arguments170['title'] = NULL;
$arguments170['accesskey'] = NULL;
$arguments170['tabindex'] = NULL;
$arguments170['onclick'] = NULL;
$arguments170['name'] = NULL;
$arguments170['rel'] = NULL;
$arguments170['rev'] = NULL;
$arguments170['target'] = NULL;
$renderChildrenClosure171 = function() use ($renderingContext, $self) {
return '<i class="fa fa-plus-square fa-fw fa-3x"></i>Help';
};
$viewHelper172 = $self->getViewHelper('$viewHelper172', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper172->setArguments($arguments170);
$viewHelper172->setRenderingContext($renderingContext);
$viewHelper172->setRenderChildrenClosure($renderChildrenClosure171);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output169 .= $viewHelper172->initializeArgumentsAndRender();

$output169 .= '
                                    ';
return $output169;
};
$viewHelper173 = $self->getViewHelper('$viewHelper173', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper173->setArguments($arguments148);
$viewHelper173->setRenderingContext($renderingContext);
$viewHelper173->setRenderChildrenClosure($renderChildrenClosure149);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper173->initializeArgumentsAndRender();

$output0 .= '
        	                </li>
        	            </ul>
        	            <!-- /#side-menu -->
        	        </div>
        	        <!-- /.sidebar-collapse -->
        	    </nav>
        	    <!-- /.navbar-static-side -->
                <div id="page-wrapper">
        	        <!-- PRELOADER -->
			        <div id="preloader"><img src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments174 = array();
$arguments174['path'] = 'img/preloader.gif';
$arguments174['package'] = NULL;
$arguments174['resource'] = NULL;
$arguments174['localize'] = true;
$renderChildrenClosure175 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper176 = $self->getViewHelper('$viewHelper176', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper176->setArguments($arguments174);
$viewHelper176->setRenderingContext($renderingContext);
$viewHelper176->setRenderChildrenClosure($renderChildrenClosure175);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper176->initializeArgumentsAndRender();

$output0 .= '" alt="" /></div>
			        <!-- //PRELOADER -->
			        <div class="preloader_hide">
                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments177 = array();
$arguments177['section'] = 'Content';
$arguments177['partial'] = NULL;
$arguments177['arguments'] = array (
);
$arguments177['optional'] = false;
$renderChildrenClosure178 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper179 = $self->getViewHelper('$viewHelper179', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper179->setArguments($arguments177);
$viewHelper179->setRenderingContext($renderingContext);
$viewHelper179->setRenderChildrenClosure($renderChildrenClosure178);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output0 .= $viewHelper179->initializeArgumentsAndRender();

$output0 .= '
	        	    </div>
        	    </div>
	       </div>
    </body>

</html>
';

return $output0;
}


}
#0             63420     