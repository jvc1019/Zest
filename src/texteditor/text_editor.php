<!-- 
    Simple Text Editor (BETA)
    by Janley Molina
    https://opensource.org/licenses/CDDL-1.0
-->

<div class="form-group editor">

    <div contenteditable="true" class="form-control overflow-auto border-primary border-top-0 border-left-0 border-right-0 rounded-0 d-inline-block editor_textarea" data-placeholder="Placeholder text here"><?php if (!empty($row["note_Content"])) {
                                                                                                                                                                                                                    echo $row["note_Content"];
                                                                                                                                                                                                                } ?></div>

    <br>

    <div class="alert alert-light shadow">
        <div class="row form-inline">
            <select class="custom-select border-0 rounded-0 editor_font" data-toggle="tooltip" title="Change font">
                <option class="editor_font_sans-serif" value="sans-serif">
                    sans-serif
                </option>
                <option class="editor_font_serif" value="serif">
                    serif
                </option>
                <option class="editor_font_monospace" value="monospace">
                    monospace
                </option>
                <option class="editor_font_cursive" value="cursive">
                    cursive
                </option>
            </select>

            <select class="custom-select border-0 rounded-0 editor_fontSize m-1" data-toggle="tooltip" title="Change font size">
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="14">14</option>
                <option value="16">16</option>
                <option value="18">18</option>
                <option value="20">20</option>
                <option value="22">22</option>
                <option value="24">24</option>
                <option value="26">26</option>
                <option value="28">28</option>
                <option value="36">36</option>
                <option value="48">48</option>
                <option value="72">72</option>
            </select>

            <!-- <select class="custom-select border-0 rounded-0 editor_fontSize m-1" data-toggle="tooltip" title="Change font size">
                <option value="red" style="color:red">red</option>
                <option value="green" style="color:green">green</option>
                <option value="blue" style="color:blue">blue</option>
            </select> -->

            <button type="button" class="btn rounded-0 editor_bold" data-toggle="tooltip" title="Bold">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-type-bold" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.21 13c2.106 0 3.412-1.087 3.412-2.823 0-1.306-.984-2.283-2.324-2.386v-.055a2.176 2.176 0 0 0 1.852-2.14c0-1.51-1.162-2.46-3.014-2.46H3.843V13H8.21zM5.908 4.674h1.696c.963 0 1.517.451 1.517 1.244 0 .834-.629 1.32-1.73 1.32H5.908V4.673zm0 6.788V8.598h1.73c1.217 0 1.88.492 1.88 1.415 0 .943-.643 1.449-1.832 1.449H5.907z" />
                </svg>
            </button>
            <button type="button" class="btn rounded-0 editor_italicize" data-toggle="tooltip" title="Italicize">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-type-italic" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.991 11.674L9.53 4.455c.123-.595.246-.71 1.347-.807l.11-.52H7.211l-.11.52c1.06.096 1.128.212 1.005.807L6.57 11.674c-.123.595-.246.71-1.346.806l-.11.52h3.774l.11-.52c-1.06-.095-1.129-.211-1.006-.806z" />
                </svg>
            </button>
            <button type="button" class="btn rounded-0 editor_underline" data-toggle="tooltip" title="Underline">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-type-underline" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.313 3.136h-1.23V9.54c0 2.105 1.47 3.623 3.917 3.623s3.917-1.518 3.917-3.623V3.136h-1.23v6.323c0 1.49-.978 2.57-2.687 2.57-1.709 0-2.687-1.08-2.687-2.57V3.136z" />
                    <path fill-rule="evenodd" d="M12.5 15h-9v-1h9v1z" />
                </svg>
            </button>
            <button type="button" class="btn rounded-0 editor_strikethrough" data-toggle="tooltip" title="Strikethrough">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-type-strikethrough" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.527 13.164c-2.153 0-3.589-1.107-3.705-2.81h1.23c.144 1.06 1.129 1.703 2.544 1.703 1.34 0 2.31-.705 2.31-1.675 0-.827-.547-1.374-1.914-1.675L8.046 8.5h3.45c.468.437.675.994.675 1.697 0 1.826-1.436 2.967-3.644 2.967zM6.602 6.5H5.167a2.776 2.776 0 0 1-.099-.76c0-1.627 1.436-2.768 3.48-2.768 1.969 0 3.39 1.175 3.445 2.85h-1.23c-.11-1.08-.964-1.743-2.25-1.743-1.23 0-2.18.602-2.18 1.607 0 .31.083.581.27.814z" />
                    <path fill-rule="evenodd" d="M15 8.5H1v-1h14v1z" />
                </svg>
            </button>
            <button type="button" class="btn rounded-0 editor_bullet" data-toggle="tooltip" title="Toggle bullet">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list-ul" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg>
            </button>
            <button type="button" class="btn rounded-0 editor_number" data-toggle="tooltip" title="Toggle numbering">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list-ol" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z" />
                    <path d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z" />
                </svg>
            </button>
            <button type="button" class="btn rounded-0 editor_rem" data-toggle="tooltip" title="Remove formatting">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-droplet" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10a5 5 0 0 0 10 0c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z" />
                    <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z" />
                </svg>
            </button>
        </div>
    </div>
    <input type="hidden" name="note_Content" value="<?php if (!empty($row["note_Content"])) {
                                                        echo $row["note_Content"];
                                                    } ?>">
</div>

<style>
    .editor {
        width: 36em;
    }

    .editor_font_sans-serif {
        font-family: sans-serif;
    }

    .editor_font_serif {
        font-family: serif;
    }

    .editor_font_monospace {
        font-family: monospace;
    }

    .editor_font_cursive {
        font-family: cursive;
    }

    .editor_textarea {
        resize: vertical;
        height: 16em;
    }

    .editor_textarea:empty:before {
        content: attr(data-placeholder);
        color: #6c757d;
        opacity: 1;
    }
</style>

<script src="texteditor/text_editor.js">
</script>