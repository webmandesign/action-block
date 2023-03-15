"use strict";!function(o){var t=o.i18n.__,e=o.blockEditor,n=o.components,c=o.element.createElement;o.blocks.registerBlockType("wmd/action-hook",{edit:function(o){var a=wmdActionHookBlock,l=a.info,i=a.hooks,s=o.attributes,k=s.name,r=s.context,u=t(k?"Executing this PHP code here:":"Select a hook to execute here.","action-hook-block"),b=r?", $context":"";return c("div",e.useBlockProps({className:k?"has-hook-selected":""}),l.top?c("p",{class:"wp-block-wmd-action-hook-block__info--top"},l.top):"",c("span",{},u),k?c("code",{},"do_action( '"+k+"'"+b+" );"):"",l.bottom?c("p",{class:"wp-block-wmd-action-hook-block__info--bottom"},l.bottom):"",c(e.InspectorControls,{},c(n.PanelBody,{},c(n.SelectControl,{label:t("Hook name","action-hook-block"),value:k,options:i,onChange:function(t){return o.setAttributes({name:t})}}),c(n.TextControl,{label:t("Optional context","action-hook-block"),help:t("Context value will be passed into the action hook as an additional argument.","action-hook-block"),value:r,onChange:function(t){return o.setAttributes({context:t})}}))))},save:function(){e.useBlockProps.save()}})}(window.wp);