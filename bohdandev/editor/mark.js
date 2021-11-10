(function () {
	tinymce.PluginManager.add('mark', function (editor, url) {
		editor.addButton('mark', {
			title: 'Surligner',
			cmd: 'mark',
			image: url + '/mark.svg'
		})
		editor.addCommand('mark', function () {
			let text = editor.selection.getContent({
				'format': 'html'
			})
			let matchMark = text.match(/<\/?mark>/g)
			let html = text
			if (matchMark) {
				html = html.replace(/<\/?mark>/g, '')
			} else {
				html = `<mark>${html}</mark>`
			}
			editor.execCommand('mceReplaceContent', false, html)
		})
	})
})()