/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';

/**
 * 共通のブロックコンテンツコンポーネント
 */
import { SimpleListContent } from './utils';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	const { listType, items } = attributes;

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('リスト設定', 'original-blocks')}>
					<SelectControl
						label={__('リストタイプ', 'original-blocks')}
						value={listType}
						options={[
							{ label: '箇条書き（・）', value: 'ul' },
							{ label: '番号付き（1.2.3...）', value: 'ol' }
						]}
						onChange={(value) => setAttributes({ listType: value })}
						help={__('リストの表示形式を選択してください', 'original-blocks')}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps()}>
				<SimpleListContent
					listType={listType}
					items={items}
					onItemsChange={(value) => setAttributes({ items: value })}
					isEdit={true}
				/>
			</div>
		</>
	);
}