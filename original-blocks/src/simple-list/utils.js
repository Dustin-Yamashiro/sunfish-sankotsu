/**
 * シンプルリストコンポーネント
 * editとsaveの両方で使用可能
 */
import { RichText } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { Button } from '@wordpress/components';

/**
 * シンプルリストコンテンツコンポーネント
 */
export const SimpleListContent = ({
	listType,
	items,
	onItemsChange,
	isEdit = false
}) => {
	const addItem = () => {
		const newItems = [...items, { text: '' }];
		onItemsChange(newItems);
	};

	const removeItem = (index) => {
		if (items.length > 1) {
			const newItems = items.filter((_, i) => i !== index);
			onItemsChange(newItems);
		}
	};

	const updateItem = (index, value) => {
		const newItems = [...items];
		newItems[index].text = value;
		onItemsChange(newItems);
	};

	const renderListItem = (item, index) => {
		if (isEdit) {
			return (
				<li key={index} className="simple-list-item">
					<RichText
						tagName="span"
						value={item.text}
						onChange={(value) => updateItem(index, value)}
						placeholder={__('リスト項目を入力してください...', 'original-blocks')}
					/>
					{items.length > 1 && (
						<Button
							className="remove-item-button"
							onClick={() => removeItem(index)}
							isDestructive={true}
							isSmall={true}
							title={__('項目を削除', 'original-blocks')}
						>
							×
						</Button>
					)}
				</li>
			);
		} else {
			return (
				<li key={index} className="simple-list-item">
					<RichText.Content
						tagName="span"
						value={item.text}
					/>
				</li>
			);
		}
	};

	const ListTag = listType === 'ol' ? 'ol' : 'ul';

	if (isEdit) {
		return (
			<div className="simple-list-container">
				<ListTag className={`simple-list simple-list-${listType}`}>
					{items.map((item, index) => renderListItem(item, index))}
				</ListTag>
				<Button
					className="add-item-button"
					onClick={addItem}
					isPrimary={true}
					isSmall={true}
				>
					リスト項目を追加
				</Button>
			</div>
		);
	} else {
		return (
			<ListTag className={`simple-list simple-list-${listType}`}>
				{items.map((item, index) => renderListItem(item, index))}
			</ListTag>
		);
	}
};