wp.domReady( function() {
	const getSelectedBlock = () => wp.data.select( 'core/editor' ).getSelectedBlock();
	let selectedBlock = getSelectedBlock();
	wp.data.subscribe(() => {
		const newSelectedBlock = getSelectedBlock();
		if ( newSelectedBlock === null ) {
			jQuery(".is-style-baseline-shift:not(.is-selected)").lettering();
		}
	});
});