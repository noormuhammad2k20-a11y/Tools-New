/**
 * toolEngine.js - Maps tool slugs to local Javascript implementation functions.
 */
import { textLogic, encoderLogic, devLogic, webLogic } from './toolLogic';

const registry = {
  // Text Tools
  'uppercase-converter': textLogic.upperCase,
  'lowercase-converter': textLogic.lowerCase,
  'title-case-converter': textLogic.titleCase,
  'sentence-case-converter': textLogic.sentenceCase,
  'word-counter': textLogic.wordCount,
  'text-reverser': textLogic.reverseText,
  'remove-duplicate-lines': textLogic.removeDuplicateLines,
  'slug-generator': textLogic.slugify,
  'text-truncator': textLogic.truncate,

  // Encoders/Decoders
  'base64-encoder': encoderLogic.base64Encode,
  'base64-decoder': encoderLogic.base64Decode,
  'url-encoder': encoderLogic.urlEncode,
  'url-decoder': encoderLogic.urlDecode,

  // Web Tools
  'css-minifier': webLogic.cssMinify,
  'html-minifier': webLogic.htmlMinify,

  // Developer Tools
  'json-formatter': devLogic.jsonFormat,
  'json-minifier': devLogic.jsonMinify,
};

/**
 * Executes a tool locally based on its slug and input data.
 * @param {string} slug - The unique identifier for the tool.
 * @param {FormData|object} data - The input data from the tool form.
 * @returns {Promise<string>} - The processed result.
 */
export const executeToolLocally = async (slug, data) => {
  const handler = registry[slug];
  
  if (!handler) {
    throw new Error(`Tool handler for '${slug}' not implemented in pure frontend mode.`);
  }

  // Extract the primary input (usually the first textarea/text field)
  // ToolPage passes FormData, but we might want to handle simple objects too
  let input = "";
  if (data instanceof FormData) {
    // Attempt to find a standard input key (content, input, text, etc)
    // or just take the first entry
    const entries = Array.from(data.entries());
    input = entries.length > 0 ? entries[0][1] : "";
  } else if (typeof data === 'object') {
    input = Object.values(data)[0] || "";
  } else {
    input = data;
  }

  // Simulate a slight delay for "Corporate Tech" feel if needed, 
  // or return immediately for maximum performance.
  return handler(input);
};

export const isToolFrontendReady = (slug) => {
  return !!registry[slug];
};
