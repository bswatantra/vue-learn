let mutations={
	CREATE_POST(state,post) {
		state.posts.unshift(post);
	},
	FETCH_POSTS(state,posts) {
		return state.posts=posts;
	},
	DELETE_POST(state,post) {
		let index=state.posts.findIndex(item => item.id===post.id);
		state.posts.splice(index,1);
	},
	loading(state,newLoading) {
		state.loading=newLoading;
	},
	// showModal(state,newShowModal) {
	// 	state.showModal=newShowModal;
	// }

};
export default mutations;