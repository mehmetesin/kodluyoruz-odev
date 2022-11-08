import React from 'react';
import { render, screen } from '@testing-library/react';
import userEvent from '@testing-library/user-event'
import "@testing-library/jest-dom"

import App from '../App'

describe('emoji app tests', () => {
    let title, emojiSearch, emojiList, searched

    beforeEach(() => {
        render(<App />);
        title = screen.getByText(/Emoji Search/i);
        emojiSearch = screen.getByRole('textbox');
        emojiList = screen.getAllByText(/Click to copy emoji/i);
        searched = "Blush";
    })

    test('Emoji listesi render edilmeli', () => {
        expect(emojiList.length).toEqual(20);
    });

    test('Filtreleme yapıldığında liste güncellenmeli', () => {
        userEvent.type(emojiSearch, searched)
        expect(screen.getByText(searched)).toBeInTheDocument();
    });

    test('Listedeki emojiye tıklandığında emoji kopyalanmalı', () => {
        const clickItem = emojiList.at(12)
        userEvent.click(clickItem)
        const parent = clickItem.parentElement;
        expect(parent.getAttribute("data-clipboard-text").length).toBeGreaterThan(0)
    })
})