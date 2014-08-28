<?php
class FluidCache_project_emulate_Standard_action_index_305b6b759847f18770ed006dad8a3b6be6c8cf8b extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// TODO
	return new \TYPO3\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {

return 'Default';
}
public function hasLayout() {
return TRUE;
}

/**
 * section Title
 */
public function section_768e0c1c69573fb588f61f1308a015c11468e05f(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return 'Index view of Standard controller';
}
/**
 * section Content
 */
public function section_4f9be057f0ea5d2ba72fd2c810e8d7b9aa98b469(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return '
	<div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form method=\'post\' action="/login" name="login">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][username]" type=\'text\' autofocus="" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][password]" type="password" value="" />
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <p class="text-primary text-right"><a  href="http://typo.flow/">Forgot password</a></p>
                                    <input type=\'submit\' class="btn btn-lg btn-primary btn-block" value=\'Login\' />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <div class="login-panel panel panel-default">
                    	<div class="panel-heading">
                        	<p class="panel-title">Social Signup</p>
                        </div>
                        <div class="panel-body">
                            <div>
                                <p><a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                                <a href="http://typo.flow/" class="text-muted">Facebook</a>
                                <a href="http://typo.flow/" class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>
                                <a href="http://typo.flow/" class="text-muted">Google+</a>
                                <a href="http://typo.flow/" class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a>
                                <a href="http://typo.flow/" class="text-muted">Github</a></p>
                            </div>
                        </div>
                    	 <div class="panel-heading">
                           	<h3 class="panel-title">Create a New Account</h3>
                        </div>
                        <div class="panel-body">
                        	<form method=\'post\' action="/signup" name="signup">
                                <fieldset>
                                	<div class="form-group">
                                        <input class="form-control" placeholder="Name" name="password" type="text" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Email" name="password" type="email" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type=\'text\' autofocus="" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="" />
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type=\'submit\' class="btn btn-lg btn-primary btn-block" value=\'Signup\' />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
';
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments1 = array();
$arguments1['name'] = 'Default';
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper3 = $self->getViewHelper('$viewHelper3', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper3->setArguments($arguments1);
$viewHelper3->setRenderingContext($renderingContext);
$viewHelper3->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper

$output0 .= $viewHelper3->initializeArgumentsAndRender();

$output0 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments4 = array();
$arguments4['name'] = 'Title';
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return 'Index view of Standard controller';
};

$output0 .= '';

$output0 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments6 = array();
$arguments6['name'] = 'Content';
$renderChildrenClosure7 = function() use ($renderingContext, $self) {
return '
	<div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form method=\'post\' action="/login" name="login">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][username]" type=\'text\' autofocus="" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][password]" type="password" value="" />
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <p class="text-primary text-right"><a  href="http://typo.flow/">Forgot password</a></p>
                                    <input type=\'submit\' class="btn btn-lg btn-primary btn-block" value=\'Login\' />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <div class="login-panel panel panel-default">
                    	<div class="panel-heading">
                        	<p class="panel-title">Social Signup</p>
                        </div>
                        <div class="panel-body">
                            <div>
                                <p><a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                                <a href="http://typo.flow/" class="text-muted">Facebook</a>
                                <a href="http://typo.flow/" class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>
                                <a href="http://typo.flow/" class="text-muted">Google+</a>
                                <a href="http://typo.flow/" class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a>
                                <a href="http://typo.flow/" class="text-muted">Github</a></p>
                            </div>
                        </div>
                    	 <div class="panel-heading">
                           	<h3 class="panel-title">Create a New Account</h3>
                        </div>
                        <div class="panel-body">
                        	<form method=\'post\' action="/signup" name="signup">
                                <fieldset>
                                	<div class="form-group">
                                        <input class="form-control" placeholder="Name" name="password" type="text" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Email" name="password" type="email" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type=\'text\' autofocus="" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="" />
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type=\'submit\' class="btn btn-lg btn-primary btn-block" value=\'Signup\' />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
';
};

$output0 .= '';

$output0 .= '
';

return $output0;
}


}
#0             11028     