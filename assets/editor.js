if ( wp.domReady ) {
	wp.domReady( function() {
		const getBlockList = () => wp.data.select( 'core/editor' ).getBlocks();
		let blockList = getBlockList();
		wp.data.subscribe(() => {
			const newBlockList = getBlockList();
			const blockListChanged = newBlockList !== blockList;
			blockList = newBlockList;
			if ( blockListChanged ) {
			  jQuery(".is-style-baseline-shift:not(.is-selected)").lettering();
			}
		});
	});
}