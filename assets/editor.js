wp.domReady( function() {
	wp.data.subscribe(() => {
		jQuery(".is-style-baseline-shift:not(.is-selected)").lettering();
		jQuery(".is-style-baseline-shift-intense:not(.is-selected)").lettering();
	});
});