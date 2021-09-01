wp.domReady( function() {
	wp.data.subscribe(() => {
		jQuery(".is-style-baseline-shift:not(.is-selected)").lettering();
	});
});